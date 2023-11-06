<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client([
                'base_uri' => 'https://api.unsplash.com/',
                'headers' => [
                    'Authorization' => 'Client-ID O4zZRhrlmW2T_eizc2eohiam29Q8l6rLHSmM93ZdR6U',
                ],
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
