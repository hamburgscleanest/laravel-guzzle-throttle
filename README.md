# hamburgscleanest/laravel-guzzle-throttle

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel (>= 5.5) wrapper for [Guzzle Advanced Throttle](https://github.com/hamburgscleanest/guzzle-advanced-throttle).

## Install

Via Composer

``` bash
$ composer require hamburgscleanest/laravel-guzzle-throttle
```


----------

### Automatic Package Discovery

Everything is automatically registered for you.

----------

### Configuration

Publish the config to get the example configuration.

``` bash
$ php artisan vendor:publish
```

----------

#### Example configuration

> **20** requests every **1 seconds**
>
> **100** requests every **2 minutes**

----------

``` php
    return [
        'cache' => [
            // Name of the configured driver in the Laravel cache config file / Also needs to be set when "no-cache" is set! Because it's used for the internal timers
            'driver'   => 'default',
            // Cache strategy: no-cache, cache, force-cache
            'strategy' => 'cache',
            // TTL in minutes
            'ttl'      => 900,
            // When this is set to false, empty responses won't be cached.
            'allow_empty' => true
        ],
        'rules' => [
            // host (including scheme)
            'https://www.google.com' => [
                [
                    // maximum number of requests in the given interval
                    'max_requests'     => 20,
                    // interval in seconds till the limit is reset
                    'request_interval' => 1
                ],
                [
                // maximum number of requests in the given interval
                'max_requests'     => 100,
                // interval in seconds till the limit is reset
                'request_interval' => 120
                ]
            ]
        ]
    ];
```

> Make sure the host name does not end with a trailing slash.  
> It should be `https://www.google.com` not `https://www.google.com/`.

----------

### Usage

Using the preconfigured client is super easy.
You just have to instantiate your client like this:

``` php
// returns an instance of GuzzleHttp\Client
$client = LaravelGuzzleThrottle::client(['base_uri' => 'https://www.google.com']);
```

After that you can use all off the usual `GuzzleHttp\Client` methods, e.g.

``` php
$client->get('/test'));
```

### Add other middlewares

You can still add other middlewares to the stack, too.  
Just define your stack as usual and then pass it to the throttled client:

``` php
$stack = HandlerStack::create(new CurlHandler());
$stack->push(some_other_middleware);

$client = LaravelGuzzleThrottle::client(['base_uri' => 'https://www.google.com', 'handler' => $stack]);
```

The client will 'automatically' add every other middleware to the top of the stack.

----------

### Caching

----------

#### Beforehand

Responses with an error status code `4xx` or `5xx` will not be cached (even with `force-cache` enabled)! 

----------

#### Supported drivers

For now the following drivers are officially supported `File`, `Redis` and `Memcached`.

----------

#### Options

##### Without caching - `no-cache`

Just throttle the requests. No caching is done. When the limit is exceeded, a `429 - Too Many Requests` exception will be thrown.

----------

##### With caching (default) - `cache`

Use cached responses when your defined rate limit is exceeded. The middleware will try to fallback to a cached response before throwing `429 - Too Many Requests`.

----------

##### With forced caching - `force-cache`

Always use cached responses when available to spare your rate limits. As long as there is a response in cache for the current request it will return the cached response. It will only actually send the request when it is not cached. If there is no cached response and the request limits are exceeded, it will throw `429 - Too Many Requests`.

----------

### Wildcards

> Available in version 2.x.x and higher

If you want to define the same rules for multiple different hosts, you can use wildcards.
A possible use case can be subdomains:

``` php
$rules = new RequestLimitRuleset([
        'https://www.{subdomain}.mysite.com' => [
            [
                'max_requests'     => 50,
                'request_interval' => 2
            ]
        ]
    ]);
```

This `host` will match `https://www.en.mysite.com`, `https://www.de.mysite.com`, `https://www.fr.mysite.com`, etc.

----------

### Further details

If you want to know more about the possible configurations, head over to the middleware repository: [Guzzle Advanced Throttle](https://github.com/hamburgscleanest/guzzle-advanced-throttle).

----------

## Changes

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email chroma91@gmail.com instead of using the issue tracker.

## Credits

- [Timo Prüße][link-author]
- [Andre Biel][link-andre]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/hamburgscleanest/laravel-guzzle-throttle.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/hamburgscleanest/laravel-guzzle-throttle/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/hamburgscleanest/laravel-guzzle-throttle.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/hamburgscleanest/laravel-guzzle-throttle.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/hamburgscleanest/laravel-guzzle-throttle.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/hamburgscleanest/laravel-guzzle-throttle
[link-travis]: https://travis-ci.org/hamburgscleanest/laravel-guzzle-throttle
[link-scrutinizer]: https://scrutinizer-ci.com/g/hamburgscleanest/laravel-guzzle-throttle/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/hamburgscleanest/laravel-guzzle-throttle
[link-downloads]: https://packagist.org/packages/hamburgscleanest/laravel-guzzle-throttle
[link-author]: https://github.com/Chroma91
[link-andre]: https://github.com/karllson
[link-contributors]: ../../contributors
