<?php
namespace App\Controller;

use Cabal\Core\Http\Request;

class DemoController
{
    public function getTest(\Server $server, Request $request, $vars = [])
    {
        return [
            'action' => __METHOD__,
            'input' => $request->all(),
            'vars' => $vars,
        ];
    }
}