<?php

namespace backend\models;


use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "journal".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $facebook
 * @property string|null $instagramm
 * @property string|null $linkendin
 * @property string|null $metakeyword
 * @property string|null $status
 * @property string|null $top
 * @property string|null $pdf
 * @property string|null $file
 * @property string|null $img
 */
class Journal extends \yii\db\ActiveRecord
{
    public $image;
    public $pdf;
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
        return 'journal';
    }

    /**
     * {@inheritdoc}
     */
//    public function rules()
//    {
//        return [
//            [['title'], 'required'],
//            [['title', 'facebook','instagramm','linkendin','status'], 'string'],
//            [['top', 'description', 'metakeyword','img'], 'safe'],
//            [['image'], 'file', 'extensions'=>'jpg, png, gif'],
//            [['pdf'], 'file', 'extensions'=>'pdf'],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'facebook' => Yii::t('app', 'Facebook'),
            'instagramm' => Yii::t('app', 'Instagramm'),
            'linkendin' => Yii::t('app', 'Linkendin'),
            'metakeyword' => Yii::t('app', 'Metakeyword'),
            'status' => Yii::t('app', 'Status'),
            'top' => Yii::t('app', 'Top'),
            'pdf' => Yii::t('app', 'Journal PDF Version'),
            'img' => Yii::t('app', 'Cover image'),
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



    public function uploadfile(){
        if($this->validate()){
            $path2 = 'images/'. $this->pdf->baseName . '.' . $this->pdf->extension;
            $this->pdf->saveAs($path2);
            $this->attachFile($path2);
            @unlink($path2);
            return true;
        }else{
            return false;
        }
    }
}
