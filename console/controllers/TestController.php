<?php
namespace console\controllers;

use yii\console\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        echo PHP_EOL . 'Hello, world!' . PHP_EOL;
    }
}
