<?php

namespace common\modules\chat\controllers;

use common\modules\chat\components\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Yii;
use yii\console\Controller;

/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        $port = Yii::$app->params['chat.port'];

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            8080
        );

        echo 'Server start' . PHP_EOL;

        $server->loop->addPeriodicTimer(2, function() {
            echo date('H:i:s') . PHP_EOL;
        });

        $server->run();

        echo 'Server end';
    }
}
