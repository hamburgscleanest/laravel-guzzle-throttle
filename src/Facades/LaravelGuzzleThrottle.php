<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelGuzzleThrottle
 * @package hamburgscleanest\LaravelGuzzleThrottle\Facades
 *
 */
class LaravelGuzzleThrottle extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string { return 'laravel-guzzle-throttle'; }
}