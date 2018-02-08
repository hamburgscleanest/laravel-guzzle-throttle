<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Helpers;

use hamburgscleanest\GuzzleAdvancedThrottle\RequestLimitRuleset;
use hamburgscleanest\LaravelGuzzleThrottle\Exceptions\DriverNotSetException;
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

        if (!isset($config['cache']['driver']))
        {
            throw new DriverNotSetException();
        }

        return new RequestLimitRuleset(
            $config['rules'],
            $config['cache']['strategy'] ?? 'no-cache',
            'laravel',
            new Repository(self::_getMiddlewareConfig($config['cache']['driver'], $config['cache']['ttl'] ?? null))
        );
    }

    /**
     * @param string $driverName
     * @param int $ttl
     * @return array
     */
    private static function _getMiddlewareConfig(string $driverName, int $ttl) : array
    {
        $driverConfig = self::_getConfigForDriver($driverName);
        $driver = $driverConfig['driver'] ?? 'file';
        unset($driverConfig['driver']);

        return [
            'cache' => [
                'driver'  => $driver,
                'options' => $driverConfig,
                'ttl'     => $ttl
            ]
        ];
    }

    /**
     * @param string $driverName
     * @return array
     */
    private static function _getConfigForDriver(string $driverName) : array
    {
        return Config::get('cache.stores.' . ($driverName === 'default' ? self::_getDefaultConfigName() : $driverName));
    }

    /**
     * @return string
     */
    private static function _getDefaultConfigName() : string
    {
        return Config::get('cache.default');
    }
}