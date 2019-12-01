<?php


namespace frontend\modules\api\models;


use yii\helpers\StringHelper;

class Project extends \common\models\Project
{
    public function fields()
    {
        return ['id', 'title', 'description', 'active'];
    }

    public function extraFields()
    {
        return ['tasks'];
    }
}