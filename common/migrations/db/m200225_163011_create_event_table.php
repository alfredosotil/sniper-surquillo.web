<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m200225_163011_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'short_description' => $this->string(300)->notNull(),
            'full_description' => $this->text()->notNull(),
            'annotations' => $this->text(),
            'address_reference' => $this->string(300)->notNull(),
            'latitude' => $this->string(30),
            'longitude' => $this->string(30),
            'start_at' => $this->integer()->notNull(),
            'active' => $this->smallInteger()->defaultValue(1),
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
        $this->dropTable('{{%event}}');
    }
}
