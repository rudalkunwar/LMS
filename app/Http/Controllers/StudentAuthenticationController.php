<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StudentAuthenticationController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the student using the student guard
        if (Auth::guard('student')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('student.dashboard'));
        }

        // If login fails
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    // Logout Student
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }

    // Show Dashboard
    public function dashboard()
    {
        return view('student.dashboard');
    }
}
