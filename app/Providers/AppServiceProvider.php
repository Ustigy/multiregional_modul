<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('selectedCity', session('selected_city'));

        View::composer('*', function ($view) {
            $view->with('cityUrl', function ($path = '') {
                $selectedCity = session('selected_city');
                if ($selectedCity) {
                    return url($selectedCity->slug . '/' . $path);
                }
                return url('/');
            });
        });
    }
}
