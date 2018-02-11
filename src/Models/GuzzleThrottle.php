<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Models;

use GuzzleHttp\Client;
use hamburgscleanest\GuzzleAdvancedThrottle\RequestLimitRuleset;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ClientHelper;
use hamburgscleanest\LaravelGuzzleThrottle\Helpers\ConfigHelper;

/**
 * Class GuzzleThrottle
 * @package hamburgscleanest\LaravelGuzzleThrottle\Models
 */
class GuzzleThrottle
{

    /** @var RequestLimitRuleset */
    private $_requestLimitRuleset;

    /**
     * GuzzleThrottle constructor.
     * @param RequestLimitRuleset|null $requestLimitRuleset
     */
    public function __construct(RequestLimitRuleset $requestLimitRuleset = null)
    {
        $this->_requestLimitRuleset = $requestLimitRuleset ?? ConfigHelper::getRequestLimitRuleset();
    }

    /**
     * @param array $config
     * @return Client
     * @throws \Exception
     */
    public function client(array $config) : Client
    {
        return ClientHelper::getThrottledClient($config, $this->_requestLimitRuleset);
    }
}