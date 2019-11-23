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

    public const DEFAULT_TTL = 900;

    /**
     * @param array|null $config
     * @return RequestLimitRuleset
     * @throws \hamburgscleanest\LaravelGuzzleThrottle\Exceptions\DriverNotSetException
     */
    public static function getRequestLimitRuleset(array $config = null) : RequestLimitRuleset
    {
        if ($config === null)
        {
            $config = Config::get('laravel-guzzle-throttle');
        }

        if (!isset($config['cache']['driver']))
        {
            throw new DriverNotSetException();
        }

        return new RequestLimitRuleset(
            $config['rules'],
            $config['cache']['strategy'] ?? 'no-cache',
            'laravel',
            new Repository(self::getMiddlewareConfig($config['cache']['driver'], $config['cache']['ttl'] ?? self::DEFAULT_TTL))
        );
    }

    /**
     * @param string $driverName
     * @param int $ttl
     * @return array
     */
    public static function getMiddlewareConfig(string $driverName, int $ttl) : array
    {
        $driverConfig = self::getConfigForDriver($driverName);
        $driver = $driverConfig['driver'] ?? 'file';
        unset($driverConfig['driver']);

        return [
            'cache' => [
                'driver'  => $driver,
                'options' => self::_getOptions($driverName, $driverConfig),
                'ttl'     => $ttl
            ]
        ];
    }

    /**
     * @param string $driverName
     * @return array
     */
    public static function getConfigForDriver(string $driverName) : array
    {
        return Config::get('cache.stores.' . self::getConfigName($driverName));
    }

    /**
     * @param string $driverName
     * @return string
     */
    public static function getConfigName(string $driverName) : string
    {
        return $driverName === 'default' ? Config::get('cache.default') : $driverName;
    }

    /**
     * Needs to be refactored :)
     *
     * @param string $driverName
     * @param array $config
     * @return array
     */
    private static function _getOptions(string $driverName, array $config) : array
    {
        if ($driverName !== 'redis')
        {
            return $config;
        }

        return ['database' => Config::get('database.redis.' . ($config['connection'] ?? 'default'))];
    }
}
