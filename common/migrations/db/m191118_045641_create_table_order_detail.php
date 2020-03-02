<?php

use yii\db\Migration;

/**
 * Class m191118_045641_create_table_order_detail
 */
class m191118_045641_create_table_order_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_detail}}', [
            'id' => $this->primaryKey(),
            'class_id' => $this->integer()->notNull(),
            'class_type' => $this->string()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'description' => $this->string()->notNull(),
            'price_per_unit' => $this->double()->notNull()->defaultValue('0'),
            'price' => $this->double()->notNull()->defaultValue('0'),
            'tax' => $this->double()->notNull()->defaultValue('0'),
            'vat' => $this->double()->notNull()->defaultValue('0'),
            'qty' => $this->integer()->notNull()->defaultValue('0'),
            'active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_order_detail_order', '{{%order_detail}}', 'order_id', '{{%order}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_detail_order', '{{%order_detail}}');
        $this->dropTable('{{%order_detail}}');
    }
}
