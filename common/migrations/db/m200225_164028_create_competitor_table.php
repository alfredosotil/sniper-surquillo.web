<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competitor}}`.
 */
class m200225_164028_create_competitor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%competitor}}', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer()->notNull(),
            'firstname' => $this->string()->notNull(),
            'middlename' => $this->string(),
            'lastname' => $this->string()->notNull(),
            'avatar_path' => $this->string(),
            'avatar_base_url' => $this->string(),
            'email' => $this->string()->notNull(),
            'phone_number' => $this->string(32)->notNull(),
            'birthday' => $this->string(32)->notNull(),
            'total_points' => $this->integer(11),
            'gender' => $this->smallInteger(1),
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

        $this->createTable('{{%event_competitor}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'competitor_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_team_competitor', '{{%competitor}}', 'team_id', '{{%team}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_event_event_competitor', '{{%event_competitor}}', 'event_id', '{{%event}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_competitor_event_competitor', '{{%event_competitor}}', 'competitor_id', '{{%competitor}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_team_competitor', '{{%competitor}}');
        $this->dropForeignKey('fk_event_event_competitor', '{{%event_competitor}}');
        $this->dropForeignKey('fk_competitor_event_competitor', '{{%event_competitor}}');
        $this->dropTable('{{%competitor}}');
        $this->dropTable('{{%event_competitor}}');
    }
}
