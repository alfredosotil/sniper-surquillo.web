<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%match}}`.
 */
class m200225_164235_create_match_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%match}}', [
            'id' => $this->primaryKey(),
            'event_competitor1_id' => $this->integer()->notNull(),
            'event_competitor2_id' => $this->integer()->notNull(),
            'event_competitor_winner_id' => $this->integer()->notNull(),
            'event_category_id' => $this->integer()->notNull(),
            'points' => $this->integer()->defaultValue(0),
            'submission' => $this->smallInteger()->defaultValue(0),
            'annotations' => $this->text(),
            'active' => $this->smallInteger()->defaultValue(1),
            'uuid' => $this->string(36),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk_event_competitor1_match', '{{%match}}', 'event_competitor1_id', '{{%event_competitor}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_event_competitor2_match', '{{%match}}', 'event_competitor2_id', '{{%event_competitor}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_event_competitor_winner_match', '{{%match}}', 'event_competitor_winner_id', '{{%event_competitor}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_event_category_match', '{{%match}}', 'event_category_id', '{{%event_category}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_event_competitor1_match', '{{%match}}');
        $this->dropForeignKey('fk_event_competitor2_match', '{{%match}}');
        $this->dropForeignKey('fk_event_competitor_winner_match', '{{%match}}');
        $this->dropForeignKey('fk_event_category_match', '{{%match}}');
        $this->dropTable('{{%match}}');
    }
}
