<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use common\models\Project;
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use common\models\ProjectUser;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
/* @var $query */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'active')->dropDownList(Project::STATUS_LABELS) ?>

    <?= $form->field($model, Project::RELATION_PROJECT_USERS)->widget(MultipleInput::class, [

        //https://github.com/unclead/yii2-multiple-input/wiki/Usage

        'id' => 'project-users-widget',
        'max' => 10,
        'min' => 0,
        'addButtonPosition' => MultipleInput::POS_HEADER,
        'columns' => [
            [
                'name' => 'project_id',
                'type' => 'hiddenInput',
                'defaultValue' => $model->id,
            ],
            [
                'name' => 'user_id',
                'type' => 'dropDownList',
                'title' => 'Пользователь',
                'items' => $query,
            ],
            [
                'name' => 'role',
                'type' => 'dropDownList',
                'title' => 'Роль',
                'items' => ProjectUser::ROLE_LABELS,
            ],
        ]
    ]) ?>


    <div class="form-group">
        <div class="control-label col-sm-3"></div>
        <div class="col-sm-6">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
