<?php

// @codeCoverageIgnoreStart

// example configuration
return [
    'cache' => [
        // Name of the configured driver in the Laravel cache config file / Also needs to be set when "no-cache" is set! Because it's used for the internal timers
        'driver'      => \env('CACHE_DRIVER'),
        // Cache strategy: no-cache, cache, force-cache
        'strategy'    => 'cache',
        // TTL in minutes
        'ttl'         => 900,
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

// @codeCoverageIgnoreEnd
