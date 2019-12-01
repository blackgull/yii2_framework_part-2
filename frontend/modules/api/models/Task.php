<?php

namespace frontend\modules\api\models;

class Task extends \common\models\Task
{
    public function fields()
    {
        return ['id', 'title', 'description'];
    }

    public function extraFields()
    {
        return ['project'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}