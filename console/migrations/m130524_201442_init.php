<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'role' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => 'ie2f-gwoSPdKo8YPXeG0D3VG7X1q90bR',
            'password_hash' => '$2y$13$IScC/JEDxGYDP06fT1wDsurQ13GpTSErQO4OtU1qLN2xOQal8Cb.K',
            'password_reset_token' => '',
            'email' => 'admin@sp.loc',
            'status' => 10,
            'role' => 1,
            'created_at' => '1613723221',
            'updated_at' => '1613723221',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
