<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_contents".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 */
class SiteContents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_contents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['name'], 'string', 'max' => 150],
            [['content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'content' => 'Contenido',
        ];
    }
}
