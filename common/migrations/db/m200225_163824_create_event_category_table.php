<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_category}}`.
 */
class m200225_163824_create_event_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_category}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'weight' => $this->double()->notNull(),
            'belt' => $this->string()->notNull(),
            'division' => $this->string()->notNull(),
            'active' => $this->smallInteger()->defaultValue(1),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_event_event_category', '{{%event_category}}', 'event_id', '{{%event}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_event_event_category', '{{%event_category}}');
        $this->dropTable('{{%event_category}}');
    }
}
