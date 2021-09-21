<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelGuzzleThrottle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-guzzle-throttle';
    }
}
