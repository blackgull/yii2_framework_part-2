<?php
namespace backend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
