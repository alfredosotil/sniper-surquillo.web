<?php

use yii\db\Migration;

/**
 * Class m191118_053104_create_table_schedule
 */
class m191118_053104_create_table_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'gym_discipline_id' => $this->integer(),
            'day_of_week' => $this->string()->notNull(),
            'start_hour' => $this->string()->notNull(),
            'end_hour' => $this->string()->notNull(),
            'active' => $this->smallInteger()->notNull()->defaultValue('1'),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_schedule_gym_discipline', '{{%schedule}}', 'gym_discipline_id', '{{%gym_discipline}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_schedule_gym_discipline', '{{%schedule}}');
        $this->dropTable('{{%schedule}}');
    }
}
