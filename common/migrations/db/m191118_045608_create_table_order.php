<?php

use yii\db\Migration;

/**
 * Class m191118_045608_create_table_order
 */
class m191118_045608_create_table_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'optional_client_name' => $this->string(),
            'amount' => $this->double()->notNull(),
            'phone_number' => $this->string(),
            'email' => $this->string(),
            'tax' => $this->double()->notNull()->defaultValue('0'),
            'is_paid' => $this->smallInteger()->notNull()->defaultValue('0'),
            'type_payment' => $this->smallInteger()->notNull()->defaultValue('1'),
            'annotations' => $this->text(),
            'active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_order_user', '{{%order}}', 'user_id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_user', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}
