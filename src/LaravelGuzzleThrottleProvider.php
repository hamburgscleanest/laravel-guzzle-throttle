<?php

namespace hamburgscleanest\LaravelGuzzleThrottlgit remote add origin https://github.com/hamburgscleanest/laravel-guzzle-throttle.gite;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelGuzzleThrottleProvider
 * @package hamburgscleanest\LaravelGuzzleThrottle
 */
class LaravelGuzzleThrottleProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() : void
    {
        $this->publishes([
            __DIR__ . '/config.php' => \config_path('laravel-guzzle-throttle.php')
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind('laravel-guzzle-throttle', function()
        {
            return null;
        });
    }
}