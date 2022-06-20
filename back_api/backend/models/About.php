<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $status
 * @property string $description
 * @property string $created
 * @property string $quote
 * @property string $quote_ge
 * @property string $keywords
 * @property string $title_ge
 * @property string $description_ge
 * @property string $metakeyword_ge
 */
class
About extends \yii\db\ActiveRecord
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
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'description', 'keywords', 'description_ge', 'metakeyword_ge'], 'string'],
            [['description', 'quote', 'quote_ge', 'keywords', 'title_ge', 'description_ge', 'metakeyword_ge'], 'required'],
            [['created'], 'safe'],
            [['title', 'quote', 'quote_ge', 'title_ge'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
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
            'quote' => 'Quote',
            'quote_ge' => 'Quote Ge',
            'keywords' => 'Keywords',
            'title_ge' => 'Title Ge',
            'description_ge' => 'Description Ge',
            'metakeyword_ge' => 'Metakeyword Ge',
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
