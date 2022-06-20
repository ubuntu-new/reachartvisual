<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rav".
 *
 * @property int $id
 * @property string|null $filePath
 * @property string|null $itemId
 * @property string|null $isMain
 * @property string|null $modelName
 * @property string|null $urlAlias
 * @property string|null $name
 */
class Image extends \yii\db\ActiveRecord
{
//    public $image;
//    public $gallery;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['description', 'metakeyword', 'status', 'top'], 'string'],
//            [['fullname', 'site', 'facebook', 'instagramm', 'linkendin'], 'string', 'max' => 255],
//            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'filePath' => Yii::t('app', 'filePath'),
            'itemId' => Yii::t('app', 'itemId'),
            'isMain' => Yii::t('app', 'isMain'),
            'modelName' => Yii::t('app', 'modelName'),
            'urlAlias' => Yii::t('app', 'urlAlias'),
            'name' => Yii::t('app', 'name'),
        ];
    }

}
