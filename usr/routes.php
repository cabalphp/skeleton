<?php

use Cabal\Core\Http\Response;
use Cabal\Core\Http\Request;
use Cabal\Core\Logger;
use Cabal\Core\Chain;

/**
 * @var \Cabal\Core\Server $server
 */
/**
 * @var \Cabal\Core\Application\Dispatcher $dispatcher
 */
/**
 * @var \Cabal\Route\RouteCollection $route
 */


//*
$dispatcher->registerExceptionHandler(function ($server, $ex, $chain, $request) {
    if ($ex instanceof \Cabal\Core\Exception\BadRequestException) {
        return [
            'code' => 1,
            'msg' => $ex->getMessage(),
            // 'msgs' => $ex->getMessages(),
        ];
    }
    Logger::error($ex);
    return [
        'code' => 1,
        'error' => 'Internal Server Error',
    ];;
});
//*/


$route->get('/', function (\Server $server, Request $request, $vars = []) {
    $response = new Response();
    $response->getBody()
        ->write(
            $server->plates()
                ->render('home', ['version' => $server->version()])
        );
    return $response;
});


$route->group([
    'namespace' => 'App\Controller',
], function ($route) {
    $route->get('/test/{id:\d+}', 'DemoController@getTest');
    $route->get('/user/get', 'UserController@get');
    $route->get('/chat', 'WebsocketController@chat');
    $route->ws('/ws/chat', 'WebsocketController@on');
});


// 投递示例任务
$server->task(new Chain('App\Task\ServerStart@task'));