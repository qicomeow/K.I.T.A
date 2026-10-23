<?php

namespace App\Http\Controllers;

use App\Models\CommunityEvent;
use App\Models\CommunityItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class CommunityEventController extends Controller
{
    // =========================================
    // HOMEPAGE
    // Events semalam, hari ini dan esok sahaja
    // =========================================

    public function index(): View
    {
        $yesterday = Carbon::yesterday()->startOfDay();
        $tomorrow = Carbon::tomorrow()->endOfDay();

        $events = CommunityEvent::query()
            ->where(function ($query) use ($yesterday, $tomorrow) {

                // Event yang bermula dalam tempoh ini
                // ATAU event yang sedang berlangsung
                // merentasi tempoh ini.
                $query->whereBetween('start_date', [
                    $yesterday,
                    $tomorrow
                ])
                ->orWhere(function ($q) use ($yesterday, $tomorrow) {
                    $q->where('start_date', '<=', $tomorrow)
                      ->where('end_date', '>=', $yesterday);
                });

            })
            ->orderBy('start_date', 'asc')
            ->get();

        // Marketplace - kekalkan fungsi asal
        $items = CommunityItem::with('user')
            ->where('status', 'available')
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('events', 'items'));
    }

    // =========================================
    // ALL EVENTS
    // Semua event daripada semua pengguna
    // =========================================

    public function allEvents(): View
    {
        $events = CommunityEvent::query()
            ->orderBy('start_date', 'asc')
            ->get()
            ->filter(function ($event) {
                return $event->current_status !== 'archived';
            })
            ->values();

        return view('events.all', compact('events'));
    }

    // =========================================
    // CREATE EVENT
    // =========================================

    public function create(): View
    {
        return view('events.create');
    }

    // =========================================
    // STORE EVENT
    // =========================================

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        $validated['event_date'] = $validated['start_date'];
        $validated['status'] = 'upcoming';

        $request->user()
            ->communityEvents()
            ->create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Aktiviti berjaya ditambah!');
    }

    // =========================================
    // MY EVENTS
    // Event milik pengguna yang login sahaja
    // =========================================

    public function myEvents(Request $request): View
    {
        $events = $request->user()
            ->communityEvents()
            ->orderByDesc('start_date')
            ->get();

        return view('events.index', compact('events'));
    }

    // =========================================
    // EDIT EVENT
    // =========================================

    public function edit(
        Request $request,
        CommunityEvent $event
    ): View {

        abort_unless(
            (int) $event->user_id === (int) $request->user()->id,
            403
        );

        abort_if(
            $event->status === 'cancelled',
            403,
            'Event yang dibatalkan tidak boleh diedit.'
        );

        return view('events.edit', compact('event'));
    }

    // =========================================
    // UPDATE EVENT
    // =========================================

    public function update(
        Request $request,
        CommunityEvent $event
    ): RedirectResponse {

        abort_unless(
            (int) $event->user_id === (int) $request->user()->id,
            403
        );

        abort_if(
            $event->status === 'cancelled',
            403,
            'Event yang dibatalkan tidak boleh diedit.'
        );

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        $validated['event_date'] = $validated['start_date'];

        $event->update($validated);

        return redirect()
            ->route('events.mine')
            ->with('success', 'Aktiviti berjaya dikemas kini!');
    }

    // =========================================
    // CANCEL EVENT
    // Sebab pembatalan wajib
    // =========================================

    public function cancel(
        Request $request,
        CommunityEvent $event
    ): RedirectResponse {

        abort_unless(
            (int) $event->user_id === (int) $request->user()->id,
            403
        );

        abort_if(
            $event->status === 'cancelled',
            403,
            'Event ini telah dibatalkan.'
        );

        $validated = $request->validate([
            'cancellation_reason' => [
                'required',
                'string',
                'max:2000',
            ],
        ]);

        $event->update([
            'status' => 'cancelled',
            'deleted_at' => now(),
            'cancellation_reason' => $validated['cancellation_reason'],
        ]);

        return redirect()
            ->route('events.mine')
            ->with('success', 'Aktiviti berjaya dibatalkan.');
    }
}