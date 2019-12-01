<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\YiiAsset;
use yii2mod\comments\widgets\Comment;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
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
            'id',
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
            //'avatar',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//            'verification_token',
//            'access_token',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <p>
        <?php echo Comment::widget([
            'model' => $model,
        ]); ?>
    </p>

</div>
