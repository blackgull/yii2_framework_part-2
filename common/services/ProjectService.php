<?php

namespace common\services;

use common\models\Project;
use common\models\User;
use yii\base\Component;
use common\events\AssignRoleEvent;

class ProjectService extends Component
{
    const EVENT_ASSIGN_ROLE = 'event-assign-role';

    /**
     * @param Project $project
     * @param User $user
     * @param $role
     */
    public function assignRole(Project $project, User $user, $role)
    {
        $event = new AssignRoleEvent();
        $event->project = $project;
        $event->user = $user;
        $event->role = $role;
        $this->trigger(self::EVENT_ASSIGN_ROLE, $event);
    }

    public function getRoles(Project $project, User $user)
    {
        return $project->getProjectUsers()->byUser($user->id)->select('role')->column();
    }

    public function hasRoles(Project $project, User $user, $role)
    {
        return in_array($role, $this->getRoles($project, $user));
    }
}