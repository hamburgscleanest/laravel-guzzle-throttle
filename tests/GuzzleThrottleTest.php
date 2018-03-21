<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\GuzzleAdvancedThrottle\RequestLimitRuleset;
use hamburgscleanest\LaravelGuzzleThrottle\Exceptions\DriverNotSetException;
use hamburgscleanest\LaravelGuzzleThrottle\Facades\LaravelGuzzleThrottle;
use hamburgscleanest\LaravelGuzzleThrottle\Models\GuzzleThrottle;
use Illuminate\Config\Repository;


/**
 * Class GuzzleThrottleTest
 * @package hamburgscleanest\LaravelGuzzleThrottle\Tests
 */
class GuzzleThrottleTest extends TestCase
{

    /**
     * @test
     * @throws \Exception
     */
    public function throws_cache_driver_not_set_exception() : void
    {
        $this->expectException(DriverNotSetException::class);

        LaravelGuzzleThrottle::client(['base_uri' => 'https://www.google.com']);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function gets_throttled_client() : void
    {
        $this->_setConfig();

        $host = 'https://www.google.com';
        $client = LaravelGuzzleThrottle::client(['base_uri' => $host]);
        $config = $client->getConfig();

        $this->assertEquals($host, $config['base_uri']->getScheme() . '://' . $config['base_uri']->getHost());
    }

    /**
     * @test
     */
    public function can_set_custom_ruleset() : void
    {
        $host = 'https://www.google.com';

        $customRules = new RequestLimitRuleset(
            [
                [
                    'host'             => 'https://www.google.com',
                    'max_requests'     => 1,
                    'request_interval' => 1
                ]
            ],
            'no-cache',
            'laravel',
            new Repository([
                'cache' => [
                    'driver'   => 'file',
                    'strategy' => 'no-cache',
                    'ttl'      => 900
                ],
            ])
        );

        $throttler = new GuzzleThrottle($customRules);
        $client = $throttler->client(['base_uri' => $host]);
        $config = $client->getConfig();

        $this->assertEquals($host, $config['base_uri']->getScheme() . '://' . $config['base_uri']->getHost());
    }
}