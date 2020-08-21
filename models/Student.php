<?php

namespace app\models;

use Yii;
use app\models\GroupStudent;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $status
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'status'], 'required'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 15],
            [['status'], 'in', 'range' => ['active', 'inactive']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     */
	public function getGroups()
	{
		return $this->hasMany(GroupStudent::className(), ['student_id' => 'id']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName() {
		return $this->first_name . ' ' . $this->last_name . ' ' . $this->middle_name;
	}
}
