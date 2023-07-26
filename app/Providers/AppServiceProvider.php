<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Users;
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
        Gate::define('admin', function (Users $users){
            $role = Role::findOrFail($users['role_id']);
            return $role['name'] === 'admin' || $role['name'] === 'superadmin';
        });
        Gate::define('superadmin', function (Users $users){
            $role = Role::findOrFail($users['role_id']);
            return $role['name'] === 'superadmin';
        });
        Gate::define('enumerator', function (Users $users){
            $role = Role::findOrFail($users['role_id']);
            return $role['name'] === 'enumerator' || $role['name'] === 'superadmin';
        });
    }
}
