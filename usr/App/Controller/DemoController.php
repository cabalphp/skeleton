<?php
namespace App\Controller;

use Cabal\Core\Http\Request;

class DemoController
{
    public function getTest(\Server $server, Request $request, $var = [])
    {
        return [
            'action' => __METHOD__,
            'input' => $request->all(),
            'var' => $var,
        ];
    }
}