<?php

use common\models\Project;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\comments\widgets\Comment;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => Project::RELATION_PROJECT_USERS . '.role',
                'value' => function (Project $model) {
                    return join(', ', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
                },
                'format' => 'html',
            ],
            'description:ntext',
            [
                'attribute' => 'active',
                'value' => function (Project $model) {
                    return Project::STATUS_LABELS[$model->active];
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'creator_id',
                'value' => function (Project $model) {
                    return Html::a($model->creator->username, ['user/view', 'id' => $model->creator->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'updater_id',
                'value' => function (Project $model) {
                    return Html::a($model->updater->username, ['user/view', 'id' => $model->updater->id]);
                },
                'format' => 'html',
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
