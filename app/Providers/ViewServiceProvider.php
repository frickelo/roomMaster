<?php

namespace App\Providers;
use Spatie\Permission\Models\Role;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['users.fields'], function ($view) {
            $roleItems = Role::pluck('name','name')->toArray();
            $view->with('roleItems', $roleItems);
        });
        //
    }
}