# hamburgscleanest/laravel-guzzle-throttle

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel wrapper for [Guzzle Advanced Throttle](https://github.com/hamburgscleanest/guzzle-advanced-throttle).

## Install

Via Composer

``` bash
$ composer require hamburgscleanest/laravel-guzzle-throttle
```

### Laravel < 5.5.x

Add the service provider to your providers array
``` php
    'providers' => [
                
                ...
           
            LaravelGuzzleThrottleServiceProvider::class,
        ],
```

### Laravel >= 5.5.x 

`Automatic Package Discovery`
Everything is automatically registered for you when using Laravel 5.5.x or later.

### Usage

-- TODO --

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
