<?php

use Cabal\Core\Http\Server;
use Cabal\Core\Http\Response;
use Cabal\Core\Http\Request;

/**
 * @var \Cabal\Core\Application\Dispatcher $route
 */
/**
 * @var \Cabal\Route\RouteCollection $dispatcher
 */


$route->get('/', function (Server $server, Request $request, $vars = []) {
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
});