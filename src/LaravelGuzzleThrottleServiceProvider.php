<?php

namespace hamburgscleanest\LaravelGuzzleThrottle;

use hamburgscleanest\LaravelGuzzleThrottle\Models\GuzzleThrottle;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelGuzzleThrottleServiceProvider
 * @package hamburgscleanest\LaravelGuzzleThrottle
 */
class LaravelGuzzleThrottleServiceProvider extends ServiceProvider
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
     * @throws \hamburgscleanest\GuzzleAdvancedThrottle\Exceptions\UnknownStorageAdapterException
     * @throws \hamburgscleanest\GuzzleAdvancedThrottle\Exceptions\UnknownCacheStrategyException
     * @throws \Exception
     */
    public function register() : void
    {
        $this->app->singleton('laravel-guzzle-throttle', function()
        {
            return new GuzzleThrottle();
        });
    }
}