<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\LaravelGuzzleThrottle\Exceptions\DriverNotSetException;
use hamburgscleanest\LaravelGuzzleThrottle\Facades\LaravelGuzzleThrottle;
use hamburgscleanest\LaravelGuzzleThrottle\Models\GuzzleThrottle;


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
    public function throws_cache_driver_not_set_exception()
    {
        $this->expectException(DriverNotSetException::class);

        LaravelGuzzleThrottle::client(['base_uri' => 'https://www.google.com']);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function gets_throttled_client()
    {
        $this->_setConfig();

        $host = 'https://www.google.com';
        $client = (new GuzzleThrottle())->client(['base_uri' => $host]);
        $config = $client->getConfig();

        $this->assertEquals($host, $config['base_uri']->getScheme() . '://' . $config['base_uri']->getHost());
    }
}