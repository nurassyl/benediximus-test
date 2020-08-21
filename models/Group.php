<?php

namespace app\models;

use Yii;
use app\models\GroupStudent;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $type
 * @property int $entry_year
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'type', 'entry_year'], 'required'],
            [['entry_year'], 'integer', 'min' => 2001, 'max' => 3000],
            [['name'], 'string', 'max' => 25],
            [['status'], 'in', 'range' => ['active', 'inactive']],
            [['type'], 'in', 'range' => ['remote', 'full-time']],
        ];
    }

    /**
     * {@inheritdoc}
     */
	public function getStudents()
	{
		return $this->hasMany(GroupStudent::className(), ['group_id' => 'id']);
	}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'type' => 'Type',
            'entry_year' => 'Entry Year',
        ];
    }
}
