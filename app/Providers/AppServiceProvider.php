<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role == "admin";
        });
        Gate::define('isKelurahan', function ($user) {
            return $user->role == "kelurahan";
        });
        Gate::define('isDinsos', function ($user) {
            return $user->role == "dinsos";
        });
        Gate::define('isKonfirmasi', function ($user) {
            return $user->role == "konfirmasi";
        });
        Gate::define('isKepala', function ($user) {
            return $user->role == "kepala";
        });
        // Paginator::useBootstrap();

    }
}
