<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Models;

use GuzzleHttp\Client;
use hamburgscleanest\GuzzleAdvancedThrottle\RequestLimitRuleset;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ClientHelper;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ConfigHelper;

class GuzzleThrottle
{
    private RequestLimitRuleset $_requestLimitRuleset;

    public function __construct(RequestLimitRuleset $requestLimitRuleset = null)
    {
        $this->_requestLimitRuleset = $requestLimitRuleset ?? ConfigHelper::getRequestLimitRuleset();
    }

    public function client(array $config): Client
    {
        return ClientHelper::getThrottledClient($config, $this->_requestLimitRuleset);
    }
}
