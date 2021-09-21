<?php

namespace hamburgscleanest\LaravelGuzzleThrottle;

use hamburgscleanest\LaravelGuzzleThrottle\Models\GuzzleThrottle;
use Illuminate\Support\ServiceProvider;

class LaravelGuzzleThrottleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config.php' => \config_path('laravel-guzzle-throttle.php')
        ]);
    }

    public function register(): void
    {
        $this->app->singleton('laravel-guzzle-throttle', function () {
            return new GuzzleThrottle();
        });
    }
}
