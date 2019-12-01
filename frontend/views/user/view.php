<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\comments\widgets\Comment;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Users'];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1>User: <?= Html::encode($this->title) ?></h1>

    <p class="">
        <?= Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_PREVIEW), [
            'alt' => 'User Image',
            'class' => 'img-circle',
        ]); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function (User $model) {
                    return User::STATUS_LABELS[$model->status];
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <p>
        <?php echo Comment::widget([
            'model' => $model,
        ]); ?>
    </p>

</div>
