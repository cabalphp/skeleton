<?php

return [

    'host' => '0.0.0.0',
    'port' => '9501',

    // 'logFile' => 'var/log/cabal.log',
    // 'logLevel' => \Monolog\Logger::DEBUG,

    'cache' => [
        'default' => 'redis',
        'redis' => [
            'host' => '127.0.0.1',
            'port' => '6379',
            'auth' => '123456',
        ],
    ],

    // 'validator' => [
    //     'lang' => 'zh-cn',
    //     'langDir' => '',
    // ],

    'swoole' => [
        'task_worker_num' => 1,
    ],

    'document' => [
        // 'enabled' => true,
        'cdn' => 'unpkg.zhimg.com',
        'name' => 'CabalPHP',
    ],
];