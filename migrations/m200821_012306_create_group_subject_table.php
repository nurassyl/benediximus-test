<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group_subject}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%groups}}`
 * - `{{%subjects}}`
 */
class m200821_012306_create_group_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group_subject}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'group_id' => $this->bigInteger()->unsigned()->notNull(),
            'subject_id' => $this->bigInteger()->unsigned()->notNull(),
        ]);

        // creates index for column `group_id`
        $this->createIndex(
            '{{%idx-group_subject-group_id}}',
            '{{%group_subject}}',
            'group_id'
        );

        // add foreign key for table `{{%groups}}`
        $this->addForeignKey(
            '{{%fk-group_subject-group_id}}',
            '{{%group_subject}}',
            'group_id',
            '{{%groups}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-group_subject-subject_id}}',
            '{{%group_subject}}',
            'subject_id'
        );

        // add foreign key for table `{{%subjects}}`
        $this->addForeignKey(
            '{{%fk-group_subject-subject_id}}',
            '{{%group_subject}}',
            'subject_id',
            '{{%subjects}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%groups}}`
        $this->dropForeignKey(
            '{{%fk-group_subject-group_id}}',
            '{{%group_subject}}'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-group_subject-group_id}}',
            '{{%group_subject}}'
        );

        // drops foreign key for table `{{%subjects}}`
        $this->dropForeignKey(
            '{{%fk-group_subject-subject_id}}',
            '{{%group_subject}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-group_subject-subject_id}}',
            '{{%group_subject}}'
        );

        $this->dropTable('{{%group_subject}}');
    }
}
