<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "site_images".
 *
 * @property integer $id
 * @property string $name
 * @property string $image_desktop
 * @property string $image_mobile
 */
class SiteImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['name', 'image_desktop','image_mobile'], 'required'],
            [['name', 'image_desktop'], 'required'],
            [['name'], 'string', 'max' => 150],
            [['image_desktop', 'image_mobile'], 'file']
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
            'image_desktop' => 'Imagen Escritorio',
            'image_mobile' => 'Imagen Mobile',
        ];
    }
}
