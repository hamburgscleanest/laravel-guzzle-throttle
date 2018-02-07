<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Helpers;

use hamburgscleanest\GuzzleAdvancedThrottle\RequestLimitRuleset;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigHelper
 * @package hamburgscleanest\LaravelGuzzleThrottle
 */
class ConfigHelper extends ServiceProvider
{

    /**
     * @param array $config
     * @param RequestLimitRuleset $rules
     * @return Client
     * @throws \Exception
     */
    public static function getRequestLimitRuleset() : RequestLimitRuleset
    {
        $config = Config::get('laravel-guzzle-throttle');

        return new RequestLimitRuleset(
            $config['rules'],
            $config['cache_strategy'] ?? 'no-cache',
            'laravel',
            new Repository($config)
        );
    }
}