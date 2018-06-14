<?php
namespace App\Controller;

use Cabal\Core\Http\Request;
use Cabal\Core\Base\FilterController;

class UserController extends FilterController
{
    public function rules()
    {
        return [
            'get' => [
                'id' => ['required', 'integer'],
            ],
        ];
    }

    public function get(\Server $server, Request $request, $vars = [])
    {
        return [
            'action' => __METHOD__,
            'input' => $request->all(),
            'vars' => $vars,
        ];
    }
}