# Changelog

All Notable changes to `laravel-guzzle-throttle` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## Next 

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

----------

## 4.1.1

### Security
This fixes a security vulnerabilities in `symfony/http-foundation` and `symfony/http-kernel`:  

- https://github.com/FriendsOfPHP/security-advisories/blob/master/symfony/http-foundation/CVE-2019-18888.yaml
- https://github.com/FriendsOfPHP/security-advisories/blob/master/symfony/http-kernel/CVE-2019-18887.yaml

### Other
Set default value of `ttl` to `900` instead of `null` in `ConfigHelper::getRequestLimitRuleset`.

----------

## 4.1.0

### Compatibility
Ensure compatibility to `Laravel 6.0`.

----------

## 4.0.2

### Fixed
The facade was wrongly defined as `GuzzleThrottle` instead of `LaravelGuzzleThrottle` in the `composer.json`.

----------

## 4.0.1

### Security
This fixes a security vulnerability in `symfony/http-foundation`:

https://github.com/FriendsOfPHP/security-advisories/blob/master/symfony/http-foundation/CVE-2019-10913.yaml

----------

## 4.0.0

### Added
- Compatibility with Laravel / Illuminate 5.8
- Upgraded PHPUnit to version 8

### Removed
- Dropped support for PHP 7.1

----------

## 3.1.0

- Changed the cached representation of the response

### Laravel storage adapters

You can disable caching for empty responses in the config now by setting `allow_empty` to `false`.

Check out the [example configuration](https://github.com/hamburgscleanest/laravel-guzzle-throttle#example-configuration) for more information on how to set it.

----------

## 3.0.2

Changed visibility of `ConfigHelper::getMiddlewareConfig` to public.

----------

## 3.0.1

### Fixed
The use of new HandlerStack was breaking the possibility to use a shared cookie jar by passing cookies => true in the GuzzleClient constructor (http://docs.guzzlephp.org/en/stable/quickstart.html#cookies).

Thanks @remipou!

----------

## 3.0.0

This release adds compatibility with Laravel 5.7 (Illuminate).

----------

## 2.0.9

### Improvement
The order of request parameters is now irrelevant for the cache.
If the values of the parameters are the same, the requests will be treated as the same, too.

For example if you request `/test?a=1&b=2`,  
the cache will know that it yields the same response as `/test?b=2&a=1`.

----------

## 2.0.8

Bump version of `hamburgscleanest/guzzle-advanced-throttle` to include a bugfix.

### Fixed
- The request count was not properly reset because `RateLimiter::getCurrentRequestCount()` wasn't used internally.

Thanks to @huisman303 for finding this!

----------

## 2.0.7 

### General
- Set the default cache driver to `CACHE_DRIVER` defined in the `.env` file instead of `default`.

----------

## 2.0.6

### Fixed
- Fixed issue in Redis driver 

----------

## 2.0.5 

### General
- It's now easier to use the `ConfigHelper` when using `laravel-guzzle-throttle` inside of other packages.

----------

## 2.0.4 

### Fixed
Example configuration was still in the old format. Updated example configuration to match version 2.0 specifications.

----------

## 2.0.3

### Optimization
- Made sure that the Advanced Guzzle Throttle middleware is executed before any other middleware.

----------

## 2.0.2 

### Fixed
- Fixed problems with Laravel cache drivers

----------

## 2.0.1

### Fixed
- Fixed problem in composer.json of Advanced Guzzle Throttle

----------

## 2.0.0

This version adds support for Guzzle Advanced Throttle 2.0.0.

### Added
- Host wildcards: [WILDCARDS](https://github.com/hamburgscleanest/guzzle-advanced-throttle/blob/master/README.md#wildcards)
- More flexible configuration: [USAGE](https://github.com/hamburgscleanest/guzzle-advanced-throttle#usage)

----------

## 1.0.4

### Added

- Support for Laravel 5.5

----------

## 1.0.3

### Added

Also made `ConfigHelper::getConfigName(string $driverName) ` public now.

It returns the key (in the subset `stores`) of the Laravel cache configuration. 
Default will return the key of the actual driver that is defined as the default.

----------

## 1.0.2

### Added

`ConfigHelper::getConfigForDriver(string $driverName)` is now a public method.

It returns the configuration (cache config file of Laravel) of the given driver. 
It is also possible to pass `default` to that method which returns the default driver configuration. 

----------

## 1.0.1

### Added

You can now provide a custom ruleset in the constructor. 
It is intended to make it easier to use it within another package without the need of the config file (and to avoid conflicts).

----------

## 1.0.0

- initial release
