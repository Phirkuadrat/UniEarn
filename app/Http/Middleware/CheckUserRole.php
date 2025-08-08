<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        $user = Auth::user();

        if ($user->role === null) {
            return redirect('/choose-role')->with('info', 'Please select your role first.');
        }

        if (! in_array($user->role, $roles)) {
            if ($user->role === 'seeker') {
                return redirect()->route('seeker.dashboard');
            } elseif ($user->role === 'recruiter') {
                return redirect()->route('recruiter.dashboard');
            }
            return redirect('/dashboard')->with('error', 'Access denied. Invalid role.');
        }

        return $next($request);
    }
}
