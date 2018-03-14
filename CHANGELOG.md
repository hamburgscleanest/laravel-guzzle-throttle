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
