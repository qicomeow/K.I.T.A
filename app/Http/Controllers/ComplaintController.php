<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ComplaintController extends Controller
{
    private function categories(): array
    {
        return ['street_light', 'road_damage', 'drainage', 'garbage', 'noise', 'safety', 'others'];
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $baseQuery = Complaint::query()->where('user_id', $userId);

        $totalComplaints = (clone $baseQuery)->count();
        $pendingComplaints = (clone $baseQuery)->whereIn('status', ['pending', 'reported'])->count();
        $resolvedComplaints = (clone $baseQuery)->where('status', 'resolved')->count();
        $cancelledComplaints = (clone $baseQuery)->where('status', 'cancelled')->count();

        $complaints = (clone $baseQuery)->latest()->paginate(9, ['*'], 'complaints_page')->withQueryString();

        $allowedStatuses = ['all', 'pending', 'in_progress', 'resolved', 'rejected'];
        $activeIssueStatus = strtolower((string) $request->query('status', 'all'));
        if (!in_array($activeIssueStatus, $allowedStatuses, true)) {
            $activeIssueStatus = 'all';
        }

        $issuesQuery = clone $baseQuery;
        if ($activeIssueStatus === 'pending') {
            $issuesQuery->whereIn('status', ['pending', 'reported']);
        } elseif ($activeIssueStatus !== 'all') {
            $issuesQuery->where('status', $activeIssueStatus);
        }

        $issues = $issuesQuery->latest()->paginate(9, ['*'], 'issues_page')->withQueryString();

        return view('complaints.index', compact(
            'complaints', 'totalComplaints', 'pendingComplaints',
            'resolvedComplaints', 'cancelledComplaints', 'issues', 'activeIssueStatus'
        ));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in($this->categories())],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $validated['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('complaints', 'public');
        }
        unset($validated['image']);
        Complaint::create($validated);

        return redirect()->route('complaints.index')->with('success', 'Complaint submitted successfully!');
    }

    public function edit(Complaint $complaint)
    {
        $this->ensureOwner($complaint);
        $this->ensurePending($complaint);
        return view('complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $this->ensureOwner($complaint);
        $this->ensurePending($complaint);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in($this->categories())],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $complaint->image_path;
            $validated['image_path'] = $request->file('image')->store('complaints', 'public');
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }
        unset($validated['image']);
        $complaint->update($validated);

        return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully!');
    }

    public function destroy(Complaint $complaint)
    {
        $this->ensureOwner($complaint);
        $this->ensurePending($complaint);
        $validated = request()->validate([
            'cancel_reason' => ['required', 'string', 'min:5', 'max:1000'],
        ]);
        $complaint->status = 'cancelled';
        $complaint->cancel_reason = $validated['cancel_reason'];
        $complaint->save();
        return redirect()->route('complaints.index')->with('success', 'Complaint cancelled successfully!');
    }

    private function ensureOwner(Complaint $complaint): void
    {
        abort_unless((int) $complaint->user_id === (int) Auth::id(), 403, 'You are not allowed to access this complaint.');
    }

    private function ensurePending(Complaint $complaint): void
    {
        abort_unless(in_array($complaint->status, ['pending', 'reported'], true), 403, 'Only pending complaints can be edited or cancelled.');
    }

    public function allIssues(Request $request)
    {
        $status = strtolower((string) $request->query('status', 'all'));
        if (!in_array($status, ['all', 'pending', 'in_progress', 'rejected', 'resolved'], true)) {
            $status = 'all';
        }

        $query = Complaint::query();
        if ($status === 'pending') {
            $query->whereIn('status', ['pending', 'reported']);
        } elseif ($status !== 'all') {
            $query->where('status', $status);
        }

        $issues = $query->latest()->paginate(12)->withQueryString();
        return view('issues.index', compact('issues', 'status'));
    }
}