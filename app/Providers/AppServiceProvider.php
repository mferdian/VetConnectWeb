<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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
        Route::model('booking', Booking::class);

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
