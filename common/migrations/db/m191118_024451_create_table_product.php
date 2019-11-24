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
            'description' => $this->string()->notNull(),
            'points' => $this->integer(11),
            'image_path' => $this->string()->null(),
            'image_base_url' => $this->string()->null(),
            'stock' => $this->integer()->notNull()->defaultValue('0'),
            'is_active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'uuid' => $this->string(36),
            'lock' => $this->bigInteger(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'deleted_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_024451_create_table_product cannot be reverted.\n";

        return false;
    }
    */
}
