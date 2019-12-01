<?php

use \yii\db\Migration;

class m190124_110200_add_access__token_and_avatar_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'avatar', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'access_token');
        $this->dropColumn('{{%user}}', 'avatar');
    }
}
