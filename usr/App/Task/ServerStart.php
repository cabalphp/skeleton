<?php
namespace App\Task;

use Cabal\Core\Chain;
use Cabal\Core\Logger;


class ServerStart
{
    public function task(\Server $server, $taskId, $workerId, $vars = [])
    {
        echo date('Y-m-d H:i:s') . " 示例任务执行成功\r\n";
        sleep(1);
        return new Chain('App\Task\ServerStart@finish', [], [uniqid()]);
    }

    public function finish(\Server $server, $taskId, $vars = [])
    {
        echo date('Y-m-d H:i:s') . ' 示例任务回调执行成功 vars: ' . json_encode($vars) . "\r\n";
    }
}