<?php

use yii\db\Migration;

/**
 * Class m191113_032556_create_table_user_history
 */
class m191113_032556_create_table_user_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_history}}', [
            'user_id' => $this->primaryKey(),
            'is_allergic' => $this->smallInteger()->notNull()->defaultValue('0'),
            'description' => $this->string()->notNull(),
            'indications' => $this->string()->notNull(),
            'weight' => $this->integer()->notNull(),
            'height' => $this->integer()->notNull(),
            'active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_user_history_user', '{{%user_history}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_history_user', '{{%user_history}}');
        $this->dropTable('{{%history_user}}');
    }
}
