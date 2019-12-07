<?php

use yii\db\Migration;

/**
 * Class m191113_033400_create_table_subscriber_news
 */
class m191113_033400_create_table_subscriber_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscriber_news}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'phone_number' => $this->string(),
            'created_at' => $this->integer(),
            'is_active' => $this->smallInteger()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("{{%subscriber_news}}");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191113_033400_create_table_subscriber_news cannot be reverted.\n";

        return false;
    }
    */
}
