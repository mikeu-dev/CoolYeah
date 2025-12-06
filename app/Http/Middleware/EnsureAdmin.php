<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        if (!Auth::check()) {
            // Belum login, redirect ke login panel admin
            return redirect()->route('filament.admin.auth.login');
        }

        if (!$user->hasRole('admin')) {
            // Sudah login tapi bukan admin, redirect ke panel sesuai role
            if ($user->hasRole('lecture')) {
                return redirect()->route('filament.lecture.auth.login');
            } elseif ($user->hasRole('student')) {
                return redirect()->route('filament.student.auth.login');
            }

            // Kalau role lain, logout saja
            Auth::logout();
            return redirect()->route('filament.admin.auth.login');
        }


        return $next($request);
    }
}
