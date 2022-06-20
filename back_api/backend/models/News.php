<?php

namespace backend\models;

use rico\yii2images\models\Image;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $status
 * @property string $description
 * @property string $created
 * @property int $user_id
 * @property int $title_ge
 * @property string $description_ge
 * @property string $metakeyword
 * @property string $metakeyword_ge
 * @property string $feautured
 */
class News extends \yii\db\ActiveRecord
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
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_ge'], 'string', 'max' => 255],
            [['title','title_ge', 'description_ge', 'metakeyword', 'metakeyword_ge'], 'required'],
            [['created','status', 'description', 'description_ge', 'user_id','feautured'], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
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
            'status' => 'Visible',
            'description' => 'Description',
            'created' => 'Created',
            //'user_id' => 'User ID',
            'title_ge' => 'Title Ge',
            'description_ge' => 'Description Ge',
            'metakeyword' => 'Metakeyword',
            'metakeyword_ge' => 'Metakeyword Ge',
            'feautured' => 'Feautured',
            'image' => 'Image',
        ];
    }


    public function upload(){
        if($this->validate()){
            $path = Yii::getAlias('@webroot/images/store'). $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
