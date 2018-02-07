<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Models;

use GuzzleHttp\Client;

/**
 * Class GuzzleThrottle
 * @package hamburgscleanest\LaravelGuzzleThrottle\Models
 */
class GuzzleThrottle
{

    /**
     * @param array $config
     * @return Client
     */
    public function client(array $config) : Client
    {
        return ClientHelper::getThrottledClient($config, ConfigHelper::getRequestLimitRuleset());
    }
}