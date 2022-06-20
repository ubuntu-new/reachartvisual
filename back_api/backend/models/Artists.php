<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "artists".
 *
 * @property int $id
 * @property string|null $fullname
 * @property string|null $description
 * @property string|null $site
 * @property string|null $facebook
 * @property string|null $instagramm
 * @property string|null $linkendin
 * @property string|null $metakeyword
 * @property string|null $status
 */
class Artists extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'metakeyword', 'status'], 'string'],
            [['fullname', 'site', 'facebook', 'instagramm', 'linkendin'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Fullname'),
            'description' => Yii::t('app', 'Description'),
            'site' => Yii::t('app', 'Site'),
            'facebook' => Yii::t('app', 'Facebook'),
            'instagramm' => Yii::t('app', 'Instagramm'),
            'linkendin' => Yii::t('app', 'Linkendin'),
            'metakeyword' => Yii::t('app', 'Metakeyword'),
            'status' => Yii::t('app', 'Status'),
            'image' => 'Image',
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'images/store'. $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
