<?php

namespace App\Providers;

use App\Filament\Auth\LogoutResponse as responsable;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponse::class, responsable::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
