<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $status
 * @property string $description
 * @property string $title_ge
 * @property string $description_ge
 * @property int $catId
 */
class Slider extends \yii\db\ActiveRecord
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
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'description', 'description_ge'], 'string'],
            [['description', 'title_ge', 'description_ge', 'catId'], 'required'],
            [['catId'], 'integer'],
            [['title', 'title_ge'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'description' => 'Description',
            'title_ge' => 'Title Ge',
            'description_ge' => 'Description Ge',
            'catId' => 'Cat ID',
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
