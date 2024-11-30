<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdminIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is authenticated, redirect them to their respective dashboard
        if (Auth::check()) {
            // Redirect logged-in users (whether they are admins or normal users) to the dashboard
            return redirect()->route('admin.dashboard'); // or any default route for logged-in users
        }

        return $next($request);
    }
}
