<?php

/**
 * @var \Cabal\Core\Application\Dispatcher $dispatcher
 */
/**
 * @var \Cabal\Core\Server $server
 */


$server->after(1, function () use ($server) {
    echo date('Y-m-d H:i:s'), ' tasker 进程启动', "\r\n";
});