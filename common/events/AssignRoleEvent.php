<?php

namespace common\events;

use common\models\Project;
use common\models\User;
use yii\base\Event;

class AssignRoleEvent extends Event
{
    /**
     * @var Project
     * @var User
     * @var $string
     */
    public $project;
    public $user;
    public $role;

    /**
     * @return array
     */
    public function dump()
    {
        return [
            'project' => $this->project->id,
            'user' => $this->user->id,
            'role' => $this->role,
        ];
    }
}