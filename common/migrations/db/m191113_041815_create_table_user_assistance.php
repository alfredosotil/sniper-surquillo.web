<?php

use yii\db\Migration;

/**
 * Class m191113_041815_create_table_user_assistance
 */
class m191113_041815_create_table_user_assistance extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_assistance}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'gym_discipline_id' => $this->integer(),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_user_user_assistance', '{{%user_assistance}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_gym_discipline_user_assistance', '{{%user_assistance}}', 'gym_discipline_id', '{{%gym_discipline}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_user_assistance', '{{%user_assistance}}');
        $this->dropForeignKey('fk_gym_discipline_user_assistance', '{{%user_assistance}}');
        $this->dropTable('{{%user_assistance}}');
    }
}
