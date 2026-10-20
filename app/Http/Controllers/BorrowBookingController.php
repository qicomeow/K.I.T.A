<?php

namespace App\Http\Controllers;

use App\Models\BorrowBooking;
use App\Models\CommunityItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BorrowBookingController extends Controller
{
    // =====================================
    // BORROWER - SUBMIT BOOKING REQUEST
    // =====================================

    public function store(Request $request, CommunityItem $item)
    {
        $validated = $request->validate([
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($item->type !== 'borrow' || $item->status !== 'available') {
            return back()->withErrors([
                'booking' => 'This item is not available for borrowing.',
            ]);
        }

        if ($item->user_id == auth()->id()) {
            return back()->withErrors([
                'booking' => 'You cannot borrow your own item.',
            ]);
        }

        $overlap = BorrowBooking::where('community_item_id', $item->id)
            ->where('status', 'approved')
            ->whereDate('start_date', '<=', $validated['end_date'])
            ->whereDate('end_date', '>=', $validated['start_date'])
            ->exists();

        if ($overlap) {
            return back()->withErrors([
                'booking' => 'The selected dates are already booked.',
            ]);
        }

        BorrowBooking::create([
            'community_item_id' => $item->id,
            'borrower_id' => auth()->id(),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Booking request submitted successfully!');
    }

    // =====================================
    // BORROWER - MY REQUESTS
    // =====================================

    public function myRequests()
    {
        $bookings = BorrowBooking::with('communityItem')
            ->where('borrower_id', auth()->id())
            ->latest()
            ->get();

        return view('borrow.my-requests', compact('bookings'));
    }

    // =====================================
    // OWNER - INCOMING REQUESTS
    // =====================================

    public function ownerRequests()
    {
        $bookings = BorrowBooking::with(['communityItem', 'borrower'])
            ->whereHas('communityItem', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('borrow.owner-requests', compact('bookings'));
    }

    // =====================================
    // OWNER - APPROVE BOOKING
    // =====================================

    public function approve(BorrowBooking $booking)
    {
        DB::transaction(function () use ($booking) {

            $item = CommunityItem::whereKey($booking->community_item_id)
                ->lockForUpdate()
                ->firstOrFail();

            abort_unless($item->user_id == auth()->id(), 403);

            $booking->refresh();

            if ($booking->status !== 'pending') {
                throw ValidationException::withMessages([
                    'booking' => 'This request has already been processed.',
                ]);
            }

            if ($item->type !== 'borrow' || $item->status !== 'available') {
                throw ValidationException::withMessages([
                    'booking' => 'This item is not available for borrowing.',
                ]);
            }

            $overlap = BorrowBooking::where('community_item_id', $item->id)
                ->where('id', '!=', $booking->id)
                ->where('status', 'approved')
                ->whereDate('start_date', '<=', $booking->end_date)
                ->whereDate('end_date', '>=', $booking->start_date)
                ->exists();

            if ($overlap) {
                throw ValidationException::withMessages([
                    'booking' => 'These dates overlap with another approved booking.',
                ]);
            }

            $booking->update([
                'status' => 'approved',
            ]);
        });

        return back()->with('success', 'Booking approved successfully!');
    }

    // =====================================
    // OWNER - REJECT BOOKING
    // =====================================

    public function reject(BorrowBooking $booking)
    {
        $item = $booking->communityItem;

        abort_unless($item && $item->user_id == auth()->id(), 403);

        if ($booking->status !== 'pending') {
            return back()->withErrors([
                'booking' => 'This request has already been processed.',
            ]);
        }

        $booking->update([
            'status' => 'rejected',
        ]);

        return back()->with('success', 'Booking rejected successfully!');
    }
}