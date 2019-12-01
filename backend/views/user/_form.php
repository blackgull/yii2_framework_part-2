<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use common\models\User;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
        'fieldConfig' => [
            //'horizontalCssClasses' => ['label' => 'col-sm-2',]
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'password')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(User::STATUS_LABELS) ?>

    <div class="form-group">
        <label class="control-label col-sm-3">Avatar</label>
        <div class="col-sm-6">
            <?= Html::img($model->getThumbUploadUrl('avatar', User::AVATAR_PREVIEW), [
                'alt' => 'User Image',
                'class' => 'img-circle',
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'avatar')->label(false)->fileInput(['accept' => 'image/*']) ?>

    <div class="form-group">
        <div class="control-label col-sm-3"></div>
        <div class="col-sm-6">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
