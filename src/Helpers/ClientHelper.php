<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use hamburgscleanest\GuzzleAdvancedThrottle\Middleware\ThrottleMiddleware;
use hamburgscleanest\GuzzleAdvancedThrottle\RequestLimitRuleset;
use Illuminate\Support\ServiceProvider;

/**
 * Class ClientHelper
 * @package hamburgscleanest\LaravelGuzzleThrottle
 */
class ClientHelper extends ServiceProvider
{

    private const HANDLER_KEY = 'handler';


    /**
     * @param array $config
     * @param RequestLimitRuleset $rules
     * @return Client
     * @throws \Exception
     */
    public static function getThrottledClient(array $config, RequestLimitRuleset $rules) : Client
    {
        $stack = self::_getHandlerStack($config);
        $stack->unshift((new ThrottleMiddleware($rules))->handle());

        return new Client($config);
    }

    /**
     * @param array $config
     * @return HandlerStack
     * @throws \Exception
     */
    private static function _getHandlerStack(array &$config) : HandlerStack
    {
        if (!isset($config[self::HANDLER_KEY]))
        {
            $stack = HandlerStack::create(new CurlHandler());
            $config[self::HANDLER_KEY] = $stack;
        }

        return $config[self::HANDLER_KEY];
    }
}