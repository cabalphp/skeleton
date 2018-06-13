<?php

return [
    'host' => '0.0.0.0',
    'port' => '9501',

    'cache' => [
        'default' => 'redis',
        'redis' => [
            'host' => '127.0.0.1',
            'port' => '6379',
            'auth' => '123456',
        ],
    ],

    'swoole' => [],
];