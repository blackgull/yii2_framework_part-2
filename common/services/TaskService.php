<?php


namespace common\services;

use common\models\Project;
use common\models\Task;
use common\models\User;
use yii\base\Component;
use common\services\ProjectService;

class TaskService extends Component
{
    public function canManage(Project $project, User $user)
    {
       //TODO Проверяет может ли пользователь управлять задачами в проекте - может если он менеджер в проекте, используйте hasRole() из ProjectService
    }

    public function canTake(Task $task, User $user)
    {
        //TODO Проверяет может ли пользователь взять задачу в работу - может если он девелопер в проекте (используйте hasRole() из ProjectService), и поле executor_id у задачи пустое
    }

    public function canCompele(Task $task, User $user)
    {
        //TODO Проверяет может ли пользователь закончить работу - может если ид пользователя в поле executor_id у задачи и поле completed_at у задачи пустое
    }

    public function takeTask(Task $task, User $user)
    {
        //TODO взять задачу в работу - изменяем start_at и executor_id и возвращаем результат сохранения
    }

    public function  completeTask(Task $task)
    {
        //TODO закончить работу - изменяем completed_at и возвращаем результат сохранения
    }
}