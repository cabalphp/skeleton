<?php
namespace App\Controller;

use Cabal\Core\Http\Request;
use Cabal\Core\Http\Frame;
use Cabal\Core\Http\Response;

class WebsocketController
{
    public function chat(\Server $server, Request $request, $vars = [])
    {
        $response = new Response();
        $response->getBody()
            ->write(
                $server->plates()->render('chat')
            );
        return $response;
    }

    public function onHandShake(\Server $server, Request $request, $vars = [])
    {
        $session = $request->session();
        $session['test'] = date('Y-m-d H:i:s');

        $fdSession = $request->fdSession();
        $fdSession['test'] = date('Y-m-d H:i:s');
        $onlines = $server->onlines->add();

    }

    public function onOpen(\Server $server, Request $request)
    {
    }
    public function onMessage(\Server $server, Frame $frame, $vars = [])
    {
        $fdSession = $frame->fdSession();
        $data = trim($frame->data);
        if (strlen($data) >= 6 && strtolower(substr($data, 0, 6)) == '/name ') {
            $nickname = substr($data, 6);
            if (mb_strlen($nickname, 'utf-8') > 12 || mb_strlen($nickname, 'utf-8') < 2) {
                $server->push($frame->fd, json_encode([
                    'systemMsg' => '昵称必须是2至12个字！',
                ]));
            } else {
                $fdSession['nickname'] = $nickname;
                $server->push($frame->fd, json_encode([
                    'systemMsg' => "昵称修改为 " . $nickname . " 成功！",
                ]));
            }
            return;
        } elseif (strlen($data) >= 5 && strtolower(substr($data, 0, 5)) == '/join') {
            $onlines = $server->onlines->get();
            $server->push($frame->fd, json_encode([
                'systemMsg' => "欢迎你加入聊天室！",
            ]));
            foreach ($server->connections as $fd) {
                $connectionInfo = $server->connection_info($fd);
                if (isset($connectionInfo['websocket_status']) && $connectionInfo['websocket_status'] == WEBSOCKET_STATUS_FRAME) {
                    $server->push($fd, json_encode([
                        'onlineNums' => $onlines,
                    ]));
                }
            }
            return;
        } elseif (strlen($data) < 1) {
            // $server->push($frame->fd, json_encode([
            //     'systemMsg' => "内容不能为空哦！",
            // ]));
            return;
        }

        $nickname = isset($fdSession['nickname']) ? $fdSession['nickname'] : "游客" . $frame->fd;
        foreach ($server->connections as $fd) {
            $connectionInfo = $server->connection_info($fd);
            if (isset($connectionInfo['websocket_status']) && $connectionInfo['websocket_status'] == WEBSOCKET_STATUS_FRAME) {
                $server->push($fd, json_encode([
                    'nickname' => $nickname,
                    'datetime' => date('Y-m-d H:i:s'),
                    'msg' => $frame->data,
                ]));
            }
        }
    }

    public function onClose(\Server $server, $fd, $reactorId)
    {
        $onlines = $server->onlines->sub();
        foreach ($server->connections as $fd) {
            $connectionInfo = $server->connection_info($fd);
            if (isset($connectionInfo['websocket_status']) && $connectionInfo['websocket_status'] == WEBSOCKET_STATUS_FRAME) {
                $server->push($fd, json_encode([
                    'onlineNums' => $onlines,
                ]));
            }
        }
    }

}
