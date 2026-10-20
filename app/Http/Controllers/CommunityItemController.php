<?php

namespace App\Http\Controllers;

use App\Models\CommunityItem;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CommunityItemController extends Controller
{
    /**
     * Paparkan barang tersedia dengan fungsi search dan filter.
     */
    public function index(Request $request): View
    {
        $query = CommunityItem::with('user')
            ->where('status', 'available');

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $items = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = CommunityItem::where('status', 'available')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('community.index', compact('items', 'categories'));
    }

    /**
     * Paparkan borang untuk menambah barang.
     */
    public function create(): View
    {
        return view('community.create');
    }

    /**
     * Simpan barang baharu ke dalam database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'category' => ['required', 'string', 'max:100'],
            'type' => ['required', 'in:give_away,borrow,sell'],
            'price' => [
                'nullable',
                'required_if:type,sell',
                'numeric',
                'min:0.01',
                'max:99999999.99',
            ],
            'location' => ['required', 'string', 'max:255'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($validated['type'] !== 'sell') {
            $validated['price'] = null;
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')
                ->store('community-items', 'public');
        }

        unset($validated['image']);

        $validated['status'] = 'available';

        $request->user()
            ->communityItems()
            ->create($validated);

        return redirect()
            ->route('community.index')
            ->with('success', 'Barang berjaya ditambah!');
    }

    /**
     * Paparkan dashboard barang milik pengguna.
     */
    public function myItems(Request $request): View
    {
        $items = $request->user()
            ->communityItems()
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('community.my-items', compact('items'));
    }

    /**
     * Paparkan butiran barang.
     */
    public function show(CommunityItem $item): View
    {
        $item->load('user');

        return view('community.show', compact('item'));
    }

    /**
     * Paparkan borang edit barang sendiri.
     */
    public function edit(Request $request, CommunityItem $item): View
    {
        abort_unless(
            $request->user()->id === $item->user_id,
            403
        );

        return view('community.edit', compact('item'));
    }

    /**
     * Simpan perubahan barang sendiri.
     */
    public function update(
        Request $request,
        CommunityItem $item
    ): RedirectResponse {
        abort_unless(
            $request->user()->id === $item->user_id,
            403
        );

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'category' => ['required', 'string', 'max:100'],
            'type' => ['required', 'in:give_away,borrow,sell'],
            'price' => [
                'nullable',
                'required_if:type,sell',
                'numeric',
                'min:0.01',
                'max:99999999.99',
            ],
            'location' => ['required', 'string', 'max:255'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($validated['type'] !== 'sell') {
            $validated['price'] = null;
        }

        $oldImagePath = $item->image_path;

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')
                ->store('community-items', 'public');
        }

        unset($validated['image']);

        $item->update($validated);

        if ($request->hasFile('image') && $oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        if ($request->input('from') === 'my-items') {
            return redirect()
                ->route('community.show', [
                    'item' => $item->id,
                    'from' => 'my-items',
                ])
                ->with('success', 'Barang berjaya dikemaskini!');
        }

        return redirect()
            ->route('community.show', $item)
            ->with('success', 'Barang berjaya dikemaskini!');
    }

    /**
     * Padam barang milik pengguna sendiri.
     */
    public function destroy(
        Request $request,
        CommunityItem $item
    ): RedirectResponse {
        abort_unless(
            $request->user()->id === $item->user_id,
            403
        );

        if ($item->image_path) {
            Storage::disk('public')->delete($item->image_path);
        }

        $item->delete();

        return redirect()
            ->route('community.my-items')
            ->with('success', 'Barang berjaya dipadam!');
    }
}