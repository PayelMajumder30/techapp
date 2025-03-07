<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\DepartmentInterface;
use App\Interfaces\CategoryInterface;
use App\Repositories\DepartmentRepository;
use App\Repositories\CategoryRepository;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);

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
        
        $settingsTableExists = Schema::hasTable('settings');
        if($settingsTableExists){
            $settings = Setting::get();
            //dd($settings);
        }

        view()->share('settings', $settings);
    }
}
