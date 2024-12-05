<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class InstructorAuthenticationController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        // Redirect authenticated instructors to the dashboard
        if (Auth::guard('instructor')->check()) {
            return redirect()->route('instructor.dashboard');
        }

        return view('instructor.auth.login');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the instructor using the instructor guard
        if (Auth::guard('instructor')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('instructor.dashboard'));
        }

        // If login fails
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Logout instructor
    public function logout(Request $request)
    {
        Auth::guard('instructor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('instructor.login');
    }

    // Show Dashboard
    public function dashboard()
    {
        return view('instructor.dashboard');
    }
}
