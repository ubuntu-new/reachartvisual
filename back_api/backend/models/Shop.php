<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $price
 * @property string|null $offerPrice
 * @property int|null $latest
 * @property int|null $bestSellers
 * @property string|null $visible
 * @property string|null $shopurl
 * @property string $dateTime
 * @property string $metakeyword
 * @property int|null $artistsId
 * @property string|null $facebook
 * @property string|null $instagramm
 */
class Shop extends \yii\db\ActiveRecord
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
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'visible', 'metakeyword'], 'string'],
            [['latest', 'bestSellers', 'artistsId'], 'integer'],
            [['dateTime'], 'safe'],
            [['metakeyword'], 'required'],
            [['name', 'price', 'offerPrice', 'shopurl', 'facebook', 'instagramm'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'offerPrice' => Yii::t('app', 'Offer Price'),
            'latest' => Yii::t('app', 'Latest'),
            'bestSellers' => Yii::t('app', 'Best Sellers'),
            'visible' => Yii::t('app', 'Visible'),
            'shopurl' => Yii::t('app', 'Shopurl'),
            'dateTime' => Yii::t('app', 'Date Time'),
            'metakeyword' => Yii::t('app', 'Metakeyword'),
            'artistsId' => Yii::t('app', 'Artists ID'),
            'facebook' => Yii::t('app', 'Facebook'),
            'instagramm' => Yii::t('app', 'Instagramm'),
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
