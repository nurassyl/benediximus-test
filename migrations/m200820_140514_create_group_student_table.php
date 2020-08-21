<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group_student}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%students}}`
 * - `{{%students}}`
 */
class m200820_140514_create_group_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group_student}}', [
            'group_id' => $this->bigInteger()->unsigned()->notNull(),
            'student_id' => $this->bigInteger()->unsigned()->notNull(),
        ]);

        // creates index for column `group_id`
        $this->createIndex(
            '{{%idx-group_student-group_id}}',
            '{{%group_student}}',
            'group_id'
        );

        // add foreign key for table `{{%students}}`
        $this->addForeignKey(
            '{{%fk-group_student-group_id}}',
            '{{%group_student}}',
            'group_id',
            '{{%groups}}',
            'id',
            'CASCADE'
        );

        // creates index for column `student_id`
        $this->createIndex(
            '{{%idx-group_student-student_id}}',
            '{{%group_student}}',
            'student_id'
        );

        // add foreign key for table `{{%students}}`
        $this->addForeignKey(
            '{{%fk-group_student-student_id}}',
            '{{%group_student}}',
            'student_id',
            '{{%students}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%students}}`
        $this->dropForeignKey(
            '{{%fk-group_student-group_id}}',
            '{{%group_student}}'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-group_student-group_id}}',
            '{{%group_student}}'
        );

        // drops foreign key for table `{{%students}}`
        $this->dropForeignKey(
            '{{%fk-group_student-student_id}}',
            '{{%group_student}}'
        );

        // drops index for column `student_id`
        $this->dropIndex(
            '{{%idx-group_student-student_id}}',
            '{{%group_student}}'
        );

        $this->dropTable('{{%group_student}}');
    }
}
