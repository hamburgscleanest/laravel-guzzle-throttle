<?php

namespace hamburgscleanest\LaravelGuzzleThrottle\Exceptions;

class DriverNotSetException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Please provide a cache driver.');
    }
}
