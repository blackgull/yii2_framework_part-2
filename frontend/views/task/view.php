<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\comments\widgets\Comment;

/* @var $this yii\web\View */
/* @var $model common\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'project.title',
            'description:ntext',
            'executor.username',
            'started_at:datetime',
            'completed_at:datetime',
            'creator.username',
            'updater.username',
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
