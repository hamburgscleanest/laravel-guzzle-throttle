<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\LaravelGuzzleThrottle\LaravelGuzzleThrottleServiceProvider;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * Class TestCase
 * @package hamburgscleanest\LaravelGuzzleThrottle\Tests
 */
class TestCase extends Orchestra
{

    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app) : array
    {
        return [LaravelGuzzleThrottleServiceProvider::class];
    }

    protected function _setConfig() : void
    {
        $config = require 'config/test.php';

        Config::shouldReceive('get')->with('laravel-guzzle-throttle')->andReturn($config);
        Config::shouldReceive('get')->with('cache.default')->andReturn('test');
        Config::shouldReceive('get')->with('cache.stores.test')->andReturn(['driver' => 'file', 'path' => './']);
    }
}