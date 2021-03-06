<?php

use yii\db\Migration;

/**
 * Class m191118_024451_create_table_product
 */
class m191118_024451_create_table_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->double()->notNull()->defaultValue('0'),
            'short_description' => $this->string()->notNull(),
            'full_description' => $this->string()->notNull(),
            'points' => $this->integer(11),
            'image_path' => $this->string()->null(),
            'image_base_url' => $this->string()->null(),
            'stock' => $this->integer()->notNull()->defaultValue('0'),
            'active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
