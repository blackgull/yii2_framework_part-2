<?php

namespace common\modules\chat\widgets;

use common\modules\chat\widgets\assets\ChatAsset;
use Yii;
use yii\web\View;

class Chat extends \yii\bootstrap\Widget
{
    public $port;

    public function init()
    {
        ChatAsset::register($this->view);
        //$this->view->registerJs('var wsPort = ' . $this->port, View::POS_HEAD);
        $this->view->registerJsVar('wsPort', $this->port);
    }

    public function run()
    {
        return $this->render('chat');
    }
}
