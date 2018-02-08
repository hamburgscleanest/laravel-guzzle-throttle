<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Models;

use GuzzleHttp\Client;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ClientHelper;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ConfigHelper;

/**
 * Class GuzzleThrottle
 * @package hamburgscleanest\LaravelGuzzleThrottle\Models
 */
class GuzzleThrottle
{

    /**
     * @param array $config
     * @return Client
     * @throws \Exception
     */
    public function client(array $config) : Client
    {
        return ClientHelper::getThrottledClient($config, ConfigHelper::getRequestLimitRuleset());
    }
}