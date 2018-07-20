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
                // 'email' => ['required', 'email', ['lengthMin', 4]],
            ],
        ];
    }

    /**
     * 获取用户
     * @apiModule 用户
     * @apiDescription 获取用户接口
     * - 支持换行
     * - 支持markdown
     * @apiParam string id 用户ID
     * @apiSuccess int code 返回码，0表示成功
     * @apiSuccess string msg 提示信息
     * @apiSuccess object data 提示信息
     * @apiSuccess object data.user 用户
     * @apiSuccess int data.user.id 用户ID
     * @apiSuccess int data.user.username 用户名
     * @apiSuccess int data.user.createdAt 创建时间戳
     * @apiSuccessExample json 创建成果 {
     *     "code":0, 
     *     "message":"",
     *     "data":{
     *         "user": {
     *             "id": 1,
     *             "username": "CabalPHP",
     *             "createdAt": 1530374400,
     *         }
     *     }
     * }
     * @apiError int code 错误码
     * @apiError string msg 错误信息
     * @apiErrorExample json Example {
     *     "code": 1,
     *     "message": "用户ID不存在"
     * } 
     * @apiErrorExample json Example2 {
     *     "code": 1,
     *     "message": "Id 只能是整数"
     * } 
     */
    public function get(\Server $server, Request $request, $vars = [])
    {
        $id = $request->input('id');
        if ($id < 10) {
            return [
                'code' => 0,
                'message' => '',
                'data' => [
                    'user' => [
                        'id' => $request->input('id'),
                        'username' => 'CabalPHP',
                        'createdAt' => 1530374400,
                    ],
                ],
            ];
        } else {
            return [
                'code' => 0,
                'message' => '用户ID不存在',
            ];
        }
    }
}