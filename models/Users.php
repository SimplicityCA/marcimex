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
 * @property string $number_id
 *
 * @property Scores[] $scores
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
            [['name', 'last_name', 'email', 'phone', 'city', 'creation_date', 'number_id'], 'required'],
            [['creation_date'], 'safe'],
            [['name', 'last_name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['email'], 'email', 'message'=>'{attribute} inválido'],
            [['city'], 'string', 'max' => 50],
            [['number_id'], 'string', 'max' => 10, 'min'=>10],
           //[['number_id'], 'match', 'pattern' => '/^[0-9]/', 'message'=>'{attribute} solo se acepta números'],
            [['number_id','phone'], 'number', 'message'=>'{attribute} solo se acepta números'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombres',
            'last_name' => 'Apellidos',
            'email' => 'Email',
            'phone' => 'Teléfono',
            'city' => 'Ciudad',
            'creation_date' => 'Creation Date',
            'number_id' => 'Cédula de identidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScores()
    {
        return $this->hasMany(Scores::className(), ['user_id' => 'id']);
    }
}
