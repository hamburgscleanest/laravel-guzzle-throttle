<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ConfigHelper;
use Illuminate\Support\Facades\Config;

/**
 * Class ConfigHelperTest
 * @package hamburgscleanest\LaravelGuzzleThrottle\Tests
 */
class ConfigHelperTest extends TestCase
{

    /**
     * @test
     * @throws \Exception
     */
    public function gets_request_limit_ruleset() : void
    {
        $this->_setConfig();

        $requestLimitGroup = ConfigHelper::getRequestLimitRuleset()->getRequestLimitGroup();

        $this->assertEquals(1, $requestLimitGroup->getRequestLimiterCount());
        $this->assertEquals(0, $requestLimitGroup->getRetryAfter());
    }

    /**
     * @test
     */
    public function gets_correct_redis_database() : void
    {
        Config::shouldReceive('get')->with('laravel-guzzle-throttle')->andReturn([
            'cache' => [
                'driver'   => 'redis',
                'strategy' => 'cache',
                'ttl'      => 900
            ],
            'rules' => [
                'https://www.google.com' => [
                    [
                        'max_requests'     => 1,
                        'request_interval' => 500
                    ]
                ]
            ]
        ]);
        Config::shouldReceive('get')->with('cache.stores.redis')->andReturn(['driver' => 'redis', 'connection' => 'default']);
        Config::shouldReceive('get')->with('database.redis.default')->andReturn([
            'host'     => '127.0.0.1',
            'password' => null,
            'port'     => 6379,
            'database' => 0,
        ]);

        ConfigHelper::getRequestLimitRuleset();
    }

    /**
     * @test
     */
    public function uses_default_connection_when_not_configured() : void
    {
        Config::shouldReceive('get')->with('laravel-guzzle-throttle')->andReturn([
            'cache' => [
                'driver'   => 'redis',
                'strategy' => 'cache',
                'ttl'      => 900
            ],
            'rules' => [
                'https://www.google.com' => [
                    [
                        'max_requests'     => 1,
                        'request_interval' => 500
                    ]
                ]
            ]
        ]);
        Config::shouldReceive('get')->with('cache.stores.redis')->andReturn(['driver' => 'redis']);
        Config::shouldReceive('get')->with('database.redis.default')->andReturn([
            'host'     => '127.0.0.1',
            'password' => null,
            'port'     => 6379,
            'database' => 0,
        ]);

        ConfigHelper::getRequestLimitRuleset();
    }
}