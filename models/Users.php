<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $creation_date
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'last_name', 'email', 'phone', 'city', 'creation_date'], 'required'],
            [['creation_date'], 'safe'],
            [['name', 'last_name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['city'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'creation_date' => 'Creation Date',
        ];
    }
}
