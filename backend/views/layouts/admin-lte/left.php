<aside class="main-sidebar">

    <section class="sidebar">

       <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Users', 'icon' => 'user', 'url' => ['/user']],
                    ['label' => 'Projects', 'icon' => 'tasks', 'url' => ['/project']],
                    ['label' => 'Tasks', 'icon' => 'tasks', 'url' => ['/task']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
