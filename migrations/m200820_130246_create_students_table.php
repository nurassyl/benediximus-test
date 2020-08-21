<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%students}}`.
 */
class m200820_130246_create_students_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
			'first_name' => $this->string(15)->notNull(),
			'last_name' => $this->string(15)->notNull(),
			'middle_name' => $this->string(15),
			'status' => $this->string(20)->notNull(), // 'active', 'inactive'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%students}}');
    }
}
