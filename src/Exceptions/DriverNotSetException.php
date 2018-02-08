<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Exceptions;

/**
 * Class DriverNotSetException
 * @package hamburgscleanest\LaravelGuzzleThrottle\Exceptions
 */
class DriverNotSetException extends \RuntimeException
{

    /**
     * DriverNotSetException constructor.
     */
    public function __construct()
    {
        parent::__construct('Please provide a cache driver.');
    }
}