<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property int $catId
 * @property string|null $name
 * @property string|null $description
 * @property string $name_ge
 * @property string $description_ge
 * @property string|null $price
 * @property int|null $offer
 * @property string|null $offerPrice
 * @property int|null $latest
 * @property int|null $bestSellers
 * @property int|null $trending
 * @property string|null $visible
 * @property string|null $img
 * @property string|null $imgHover
 * @property int|null $timePeriod
 * @property string $dateTime
 * @property string $metakeyword
 * @property string $metakeyword_ge
 */
class Goods extends \yii\db\ActiveRecord
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
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'description_ge', 'visible', 'metakeyword', 'metakeyword_ge'], 'string'],
            [['name_ge', 'description_ge'], 'required'],
//            [['offer', 'latest', 'bestSellers', 'trending', 'timePeriod'], 'integer'],
            [['dateTime','img', 'imgHover','trending','catId'], 'safe'],
            [['name', 'name_ge', 'price', 'offerPrice', ], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
//            [['image'], 'file', 'maxFiles' => 3]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catId' => 'Categories Id',
            'name' => 'Name',
            'description' => 'Description',
            'name_ge' => 'Name Ge',
            'description_ge' => 'Description Ge',
            'price' => 'Price',
            //'offer' => 'Offer',
            //'offerPrice' => 'Offer Price',
            //'latest' => 'Latest',
            //'bestSellers' => 'Best Sellers',
//            'trending' => 'Feautured',
            'visible' => 'Visible',
            'image' => 'Img',
            //'imgHover' => 'Img Hover',
            //'timePeriod' => 'Time Period',
            'dateTime' => 'Date Time',
            'metakeyword' => 'Metakeyword',
            'metakeyword_ge' => 'Metakeyword Ge',
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
