<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $adminEmail = env('ADMIN_EMAIL');
        $adminPasswordHash = env('ADMIN_PASSWORD_HASH');

        if (
            $credentials['email'] === $adminEmail &&
            $adminPasswordHash &&
            Hash::check($credentials['password'], $adminPasswordHash)
        ) {
            $request->session()->regenerate();

            session([
                'admin_logged_in' => true,
                'admin_email' => $adminEmail,
            ]);

            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Login berhasil.');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'admin_logged_in',
            'admin_email',
        ]);

        $request->session()->regenerate();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Berhasil logout.');
    }
}