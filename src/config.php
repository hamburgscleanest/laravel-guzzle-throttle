<?php

// example configuration

return [
    'cache' => [
        // Name of the configured driver in the Laravel cache config file / Also needs to be set when "no-cache" is set! Because it's used for the internal timers
        'driver'   => 'default',
        // Cache strategy: no-cache, cache, force-cache
        'strategy' => 'cache',
        // TTL in minutes
        'ttl'      => 900
    ],
    'rules' => [
        [
            // host (including scheme)
            'host'             => 'https://www.google.com',
            // maximum number of requests in the given interval
            'max_requests'     => 20,
            // interval in seconds till the limit is reset
            'request_interval' => 1
        ],
        [
            // host (including scheme)
            'host'             => 'https://www.google.com',
            // maximum number of requests in the given interval
            'max_requests'     => 200,
            // interval in seconds till the limit is reset
            'request_interval' => 120
        ]
    ]
];