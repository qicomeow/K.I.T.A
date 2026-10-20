<?php

namespace App\Http\Controllers;

use App\Models\CommunityEvent;
use App\Models\CommunityItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommunityEventController extends Controller
{
    // Paparkan event di homepage
    
    public function index(): View
    {
        $events = CommunityEvent::where(function ($query) {
            $query->where('status', 'cancelled')
                ->orWhereNull('end_date')
                ->orWhere('end_date', '>=', now()->subDays(7));
        })
            ->orderBy('start_date')
            ->get();

        $items = CommunityItem::with('user')
            ->where('status', 'available')
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('events', 'items'));
    }

    // Paparkan borang cipta event
    public function create(): View
    {
        return view('events.create');
    }

    // Simpan event baharu
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

        $request->user()->communityEvents()->create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'Aktiviti berjaya ditambah!');
    }

    // Paparkan event milik pengguna yang sedang login
    public function myEvents(Request $request): View
    {
        $events = $request->user()
            ->communityEvents()
            ->orderByDesc('start_date')
            ->get();

        return view('events.index', compact('events'));
    }

    // Paparkan borang edit event
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

    // Simpan perubahan event
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

    // Batalkan event dengan sebab wajib
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