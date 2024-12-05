<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthenticationController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        // Redirect authenticated admins to the dashboard
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the admin using the admin guard
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard')); // Redirect to the dashboard
        }

        // If login fails
        throw ValidationException::withMessages([
            'email' => __('auth.failed'), // You can add a custom error message here if you like
        ]);
    }

    // Logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // Redirect back to login after logout
    }

    // Show Dashboard
    public function dashboard()
    {
        return view('admin.dashboard'); // Dashboard view for the admin
    }
}
