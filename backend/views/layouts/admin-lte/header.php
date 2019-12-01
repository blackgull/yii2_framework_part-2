<?php

use common\models\User;
use yii\helpers\Html;
use common\modules\chat\widgets\Chat;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Messages</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <?= Html::img(Yii::$app->user->identity->getThumbUploadUrl('avatar', User::AVATAR_CHAT),
                                                [
                                                    'alt' => 'User Image',
                                                    'class' => 'img-circle',
                                                ]) ?>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                        <li><?= Chat::widget(['port' => Yii::$app->params['chat.port']]); ?></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= Html::img(Yii::$app->user->identity->getThumbUploadUrl('avatar', User::AVATAR_ICO),
                            [
                                'alt' => 'User Image',
                                'class' => 'user-image',
                            ]) ?>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?= Html::img(Yii::$app->user->identity->getThumbUploadUrl('avatar', User::AVATAR_PREVIEW),
                                [
                                    'alt' => 'User Image',
                                    'class' => 'img-circle',
                                ]) ?>
                            <p>
                                <?= Yii::$app->user->identity->username; ?> - web developer
                                <small>Email: <?= Yii::$app->user->identity->email; ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a('Profile', ['user/profile', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
