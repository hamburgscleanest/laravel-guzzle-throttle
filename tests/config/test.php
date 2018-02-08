<?php

return [
    'cache' => [
        'driver'   => 'default',
        'strategy' => 'no-cache',
        'ttl'      => 900
    ],
    'rules' => [
        [
            'host'             => 'https://www.google.com',
            'max_requests'     => 1,
            'request_interval' => 1
        ]
    ]
];