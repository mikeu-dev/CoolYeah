<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        /** @var \App\Models\User */
        $loggedInUser = Auth::user();
        if (!Auth::check() || !$loggedInUser->hasRole('student')) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
