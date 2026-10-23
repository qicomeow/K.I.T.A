<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    // ========================================
    // UPDATE USER PROFILE
    // ========================================
    public function update(Request $request)
    {
        $user = $request->user();

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
                function ($attribute, $value, $fail) {
                    $words = preg_split('/\s+/u', trim($value));

                    if (count($words) !== 2) {
                        $fail('Short name must contain exactly 2 words.');
                    }
                },
            ],

            'username' => [
                'required',
                'string',
                'max:50',
                'regex:/^[A-Za-z0-9_.]+$/',
                Rule::unique('users', 'username')->ignore($user->id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:25',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $newPhoto = null;
        $oldPhoto = $user->profile_photo;

        if ($request->hasFile('profile_photo')) {
            $newPhoto = $request->file('profile_photo')
                ->store('profile-photos', 'public');

            $validated['profile_photo'] = $newPhoto;
        }

        try {
            $user->fill($validated);
            $user->save();
        } catch (\Throwable $exception) {
            if ($newPhoto) {
                Storage::disk('public')->delete($newPhoto);
            }

            throw $exception;
        }

        if ($newPhoto && $oldPhoto && $oldPhoto !== $newPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()
            ->route('home')
            ->with('success', 'Profile updated successfully!');
    }

    // ========================================
    // DELETE USER ACCOUNT
    // ========================================
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
            ],
        ]);

        $user = $request->user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Incorrect password.',
            ]);
        }

        // Account deletion is intentionally disabled
        // until related records can be handled safely.
        return back()->withErrors([
            'delete_account' => 'Account deletion is not enabled yet.',
        ]);
    }
}