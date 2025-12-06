<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('access-admin-panel', fn($user) => $user->role === 'admin');
        Gate::define('access-lecture-panel', fn($user) => in_array($user->role, ['admin', 'lecture']));
        Gate::define('access-student-panel', fn($user) => in_array($user->role, ['admin', 'lecture', 'student']));
    }
}
