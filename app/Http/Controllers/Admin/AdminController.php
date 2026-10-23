<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // ========================================
    // ADMIN ACCESS
    // ========================================

    private function ensureAdmin(): void
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'admin',
            403,
            'You do not have permission to access this page.'
        );
    }

    // ========================================
    // ADMIN DASHBOARD
    // ========================================

    public function index()
    {
        $this->ensureAdmin();

        $counts = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'in_progress' => Complaint::where('status', 'in_progress')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
            'rejected' => Complaint::where('status', 'rejected')->count(),
            'cancelled' => Complaint::where('status', 'cancelled')->count(),
        ];

        $complaints = Complaint::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.dashboard', compact(
            'counts',
            'complaints'
        ));
    }

    // ========================================
    // MANAGE REQUESTS
    // ========================================

    public function requests(Request $request)
    {
        $this->ensureAdmin();

        $status = $request->query('status', 'all');

        $allowedStatuses = [
            'all',
            'pending',
            'in_progress',
            'resolved',
            'rejected',
            'cancelled',
        ];

        if (!in_array($status, $allowedStatuses, true)) {
            abort(404);
        }

        $query = Complaint::with('user')->latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $complaints = $query
            ->paginate(12)
            ->withQueryString();

        return view('admin.requests', compact(
            'complaints',
            'status'
        ));
    }

    // ========================================
    // UPDATE COMPLAINT STATUS
    // ========================================

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'in_progress',
                    'resolved',
                    'rejected',
                ]),
            ],
            'admin_remarks' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        if ($complaint->status === 'cancelled') {
            return back()->withErrors([
                'status' => 'Cancelled complaints cannot be updated.',
            ]);
        }

        $complaint->status = $validated['status'];

        $complaint->admin_remarks =
            $validated['admin_remarks'] ?? null;

        $complaint->resolved_at =
            $validated['status'] === 'resolved'
                ? now()
                : null;

        $complaint->save();

        return back()->with(
            'success',
            'Complaint status updated successfully.'
        );
    }

    // ========================================
    // TECHNICIAN DIRECTORY
    // ========================================

    public function technicians(Request $request)
    {
        $this->ensureAdmin();

        $category = $request->query('category', 'all');

        $allowedCategories = [
            'all',
            'plumbing',
            'street_light',
            'road_damage',
            'drainage',
            'garbage',
            'noise',
            'safety',
            'others',
        ];

        if (!in_array($category, $allowedCategories, true)) {
            abort(404);
        }

        $query = Technician::latest();

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $technicians = $query
            ->paginate(10)
            ->withQueryString();

        return view('admin.technicians', compact(
            'technicians',
            'category'
        ));
    }

    // ========================================
    // ADD TECHNICIAN
    // ========================================

    public function storeTechnician(Request $request)
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'category' => [
                'required',
                Rule::in([
                    'plumbing',
                    'street_light',
                    'road_damage',
                    'drainage',
                    'garbage',
                    'noise',
                    'safety',
                    'others',
                ]),
            ],
            'address' => [
                'required',
                'string',
                'max:500',
            ],
            'phone' => [
                'required',
                'string',
                'max:30',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        Technician::create($validated);

        return redirect()
            ->route('admin.technicians')
            ->with(
                'success',
                'Technician added successfully.'
            );
    }

    // ========================================
    // REMOVE TECHNICIAN
    // ========================================

    public function destroyTechnician(Technician $technician)
    {
        $this->ensureAdmin();

        $technician->delete();

        return redirect()
            ->route('admin.technicians')
            ->with(
                'success',
                'Technician removed successfully.'
            );
    }
}