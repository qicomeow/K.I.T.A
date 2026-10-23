<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ========================================
    // SHOW REGISTER PAGE
    // ========================================
    public function showRegister()
    {
        return view('auth.register');
    }

    // ========================================
    // REGISTER USER
    // ========================================
    public function register(Request $request)
    {
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

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ]);

        $user = User::create([
            'full_name' => trim($validated['full_name']),
            'name' => trim($validated['name']),
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('home')
            ->with('success', 'Registration successful!');
    }

    // ========================================
    // SHOW LOGIN PAGE
    // ========================================
    public function showLogin()
    {
        return view('auth.login');
    }

    // ========================================
    // LOGIN USER
    // ========================================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
                'string',
            ],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('success', 'Login successful!');
        }

        return back()
            ->withErrors([
                'email' => 'Wrong email or password.',
            ])
            ->onlyInput('email');
    }

    // ========================================
    // LOGOUT USER
    // ========================================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}