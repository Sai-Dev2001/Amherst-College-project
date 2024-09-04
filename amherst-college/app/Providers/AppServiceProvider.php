<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        Gate::define('create', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('update', function (User $user, User $model) {
            return $user->is_admin || $user->id === $model->id;
        });

        Gate::define('delete', function (User $user, User $model) {
            return $user->is_admin;
        });
    }
}