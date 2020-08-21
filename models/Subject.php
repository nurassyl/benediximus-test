<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property int $id
 * @property string $name
 *
 * @property GroupSubject[] $groupSubjects
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[GroupSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupSubjects()
    {
        return $this->hasMany(GroupSubject::className(), ['subject_id' => 'id']);
    }
}
