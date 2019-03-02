<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Tests;

use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ClientHelper;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ConfigHelper;

/**
 * Class ClientHelperTest
 * @package hamburgscleanest\LaravelGuzzleThrottle\Tests
 */
class ClientHelperTest extends TestCase
{

    /**
     * @test
     * @throws \Exception
     */
    public function gets_throttled_client() : void
    {
        $this->_setConfig();

        $host = 'https://www.google.com';
        $client = ClientHelper::getThrottledClient(['base_uri' => $host], ConfigHelper::getRequestLimitRuleset());
        $config = $client->getConfig();

        $this->assertEquals($host, $config['base_uri']->getScheme() . '://' . $config['base_uri']->getHost());
    }
}
