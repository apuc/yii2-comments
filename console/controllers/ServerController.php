<?php

namespace console\controllers;

use console\daemons\EchoServers;
use yii\console\Controller;

class ServerController extends Controller
{
    public function actionStart($port = null)
    {
        $server = new EchoServers();
        if ($port) {
            $server->port = $port;
        }
        $server->start();
    }
}
