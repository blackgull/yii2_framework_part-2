<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_user}}`.
 */
class m190518_154811_create_project_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_user}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'role' => "ENUM('manager','developer','tester') NOT NULL DEFAULT 'manager'"
        ]);

//        $sql = "ALTER TABLE `project_user` ADD `role` ENUM('manager','developer','tester') NOT NULL AFTER `user_id`";
//        $this->execute($sql);

        $this->addForeignKey('fx_projectuser_user', 'project_user', ['user_id'], 'user', ['id']);
        $this->addForeignKey('fx_projectuser_project', 'project_user', ['project_id'], 'project', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_user}}');
    }
}
