<?php

use yii\db\Migration;

/**
 * Class m191113_041600_create_table_user_assistance
 */
class m191113_041600_create_table_gym_discipline extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gym_discipline}}', [
            'id' => $this->primaryKey(),
            'image_path' => $this->string(),
            'image_base_url' => $this->string(),
            'name' => $this->string(50),
            'description' => $this->string(500),
            'points' => $this->integer(11),
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
        $this->dropTable('{{%gym_discipline}}');
    }
}
