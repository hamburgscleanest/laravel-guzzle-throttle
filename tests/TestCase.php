<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\LaravelGuzzleThrottle\LaravelGuzzleThrottleServiceProvider;
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

}