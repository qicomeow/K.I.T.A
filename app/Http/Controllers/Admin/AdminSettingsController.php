<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminSettingsController extends Controller
{
    public function update(Request $request)
    {
        $admin = $request->user();

        abort_unless(
            $admin && $admin->role === 'admin',
            403
        );

        $validated = $request->validate([
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($admin->id),
            ],
            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $oldPhoto = $admin->profile_photo;
        $newPhoto = null;

        if ($request->hasFile('profile_photo')) {
            $newPhoto = $request->file('profile_photo')
                ->store('profile-photos', 'public');

            $validated['profile_photo'] = $newPhoto;
        }

        try {
            $admin->fill($validated);
            $admin->save();
        } catch (\Throwable $e) {
            if ($newPhoto) {
                Storage::disk('public')->delete($newPhoto);
            }

            throw $e;
        }

        if ($newPhoto && $oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return back()->with(
            'success',
            'Admin profile updated successfully!'
        );
    }
}