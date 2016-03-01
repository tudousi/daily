<?php

use yii\db\Migration;

class m160227_181211_user extends Migration
{
    const TABLE_NAME = "{{%user}}";
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => $this->bigPrimaryKey(20),
            'nike' => $this->string(12)->notNull(),
            'avatar' => $this->string(128)->notNull(),
            'email' => $this->string(128)->notNull(),
            'level' => $this->bigInteger(20)->notNull(),        // 等级积分
            'points' => $this->bigInteger(20)->notNull(),       // 可用积分
            'description' => $this->string(160)->notNull(),     // 简介
            'gender' => $this->smallInteger(1)->notNull(),      // 性别

            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),     // 用户状态
            'registered' => $this->dateTime(),                  // 注册时间
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->execute("ALTER TABLE user ADD KEY `email` (`email`)");
    }

    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }

}
