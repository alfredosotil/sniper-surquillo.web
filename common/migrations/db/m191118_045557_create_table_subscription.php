<?php

use yii\db\Migration;

/**
 * Class m191118_045557_create_table_subscription
 */
class m191118_045557_create_table_subscription extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string(),
            'user_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'starts_at' => $this->integer()->notNull(),
            'ends_at' => $this->integer()->notNull(),
            'subscription_state_id' => $this->integer()->notNull()->defaultValue('1'),
            'is_active' => $this->integer()->notNull()->defaultValue('1'),
        ]);

        $this->addForeignKey('fk_user_subscription', '{{%subscription}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_service_subscription', '{{%subscription}}', 'service_id', '{{%service}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_subscription', '{{%subscription}}');
        $this->dropForeignKey('fk_service_subscription', '{{%subscription}}');
        $this->dropTable('{{%subscription}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_045557_create_table_subscription cannot be reverted.\n";

        return false;
    }
    */
}
