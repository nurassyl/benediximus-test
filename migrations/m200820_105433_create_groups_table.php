<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%groups}}`.
 */
class m200820_105433_create_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%groups}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
			'name' => $this->string(25)->notNull(),
			'status' => $this->string(20)->notNull(), // 'active', 'inactive'
			'type' => $this->string(20)->notNull(), // 'remote', 'full-time'
			'entry_year' => $this->smallInteger(4)->unsigned()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%groups}}');
    }
}
