<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Task;
use common\models\ProjectUser;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn'
            ],
//            'project.title',
            [
                'attribute' => 'project',
                'value' => 'project.title'
            ],
            'title',
            'description:ntext',
            //'project_id',
            //'executor_id',
            'executor.username',
            'started_at:datetime',
            'completed_at:datetime',
            //'creator_id',
            'creator.username',
            //'updater_id',
            'updater.username',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {take} {completed}',
                'buttons' => [
                    'take' => function ($url, Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('hand-right');
                        return Html::a($icon, ['task/take', 'id' => $model->id], [
                            'title' => 'Take the task?',
                            'data' => [
                                'confirm' => 'Take the task?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'completed' => function ($url, Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('thumbs-up');
                        return Html::a($icon, ['task/completed', 'id' => $model->id], [
                            'title' => 'Completed the task?',
                            'data' => [
                                'confirm' => 'Completed the task?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
                'visibleButtons' => [
                    'update' => function (Task $model, $key, $index) {
                        return Yii::$app->projectService->hasRoles($model->project, Yii::$app->user->identity,
                            ProjectUser::ROLE_MANAGER);
                    },
                    'delete' => function (Task $model, $key, $index) {
                        return Yii::$app->projectService->hasRoles($model->project, Yii::$app->user->identity,
                            ProjectUser::ROLE_MANAGER);
                    },
                    'take' => function (Task $model, $key, $index) {
                        if ( !$model->executor_id && !$model->started_at) {
                            $icon = Yii::$app->projectService->hasRoles($model->project, Yii::$app->user->identity,
                                ProjectUser::ROLE_DEVELOPER);
                        }
                        return $icon;
                    },
                    'completed' => function (Task $model, $key, $index) {
                        if ( $model->executor_id == Yii::$app->user->id && !$model->completed_at ) {
                            $icon = Yii::$app->projectService->hasRoles($model->project, Yii::$app->user->identity,
                                ProjectUser::ROLE_DEVELOPER);
                        }
                        return $icon;
                    },
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
