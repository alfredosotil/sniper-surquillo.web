<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team}}`.
 */
class m200225_164000_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'short_description' => $this->string(300)->notNull(),
            'full_description' => $this->text()->notNull(),
            'phone_number' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'web' => $this->string(),
            'person_in_charge' => $this->string()->notNull(),
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
        $this->dropTable('{{%team}}');
    }
}
