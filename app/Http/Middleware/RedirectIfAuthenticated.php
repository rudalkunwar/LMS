<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect to appropriate dashboard based on guard
                return match ($guard) {
                    'admin' => redirect()->route('admin.dashboard'),
                    'student' => redirect()->route('student.dashboard'),
                    'instructor' => redirect()->route('instructor.dashboard'),
                    default => redirect()->route('home'),
                };
            }
        }

        return $next($request);
    }
}