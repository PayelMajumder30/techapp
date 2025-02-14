<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Interfaces\DepartmentInterface;
use App\Repositories\DepartmentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view::composer('*', function($view) {
            $user_role = Auth::check() ? Auth::user()->type : "";
            view()->share('user_role', $user_role);
        });
    }
}
