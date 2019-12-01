<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'emailService' => [
            'class' => \common\services\EmailService::class
        ],
        'projectService' => [
            'class' => \common\services\ProjectService::class,
            'on ' . \common\services\ProjectService::EVENT_ASSIGN_ROLE =>
                function (\common\events\AssignRoleEvent $e) {
                    $views = ['html' => 'assignRole-html', 'text' => 'assignRole-text'];
                    $data = ['user' => $e->user, 'project' => $e->project, 'role' => $e->role];
                    Yii::$app->emailService->send($e->user->email, 'Assign role', $views, $data);
                    //Yii::$app->notoficationService->sendAboutNewProjectRole($e->project, $e->user, $e->role);
                }
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'itemFile' => '@console/rbac/items.php',
            'assignmentFile' => '@console/rbac/assignments.php',
            //'ruleFile' => '@console/rbac/rules.php',
        ],
        'i18n' => [
            'translations' => [
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
            ],
        ],
    ],
    'modules' => [
        'chat' => [
            'class' => 'common\modules\chat\Module',
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
    ],
];
