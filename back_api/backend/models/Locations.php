<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $status
 * @property string $description
 * @property string $number
 * @property string $quote
 * @property string $keywords
 * @property string $title_ge
 * @property string $description_ge
 * @property string $keyword_ge
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'description', 'keywords', 'description_ge', 'keyword_ge'], 'string'],
            [['title_ge', 'title'], 'required'],
            [['number','quote'], 'safe'],
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
            'status' => 'Visible',
            'description' => 'Description',
            'number' => 'Number',
            'quote' => 'Quote',
            'keywords' => 'Keywords',
            'title_ge' => 'Title Ge',
            'description_ge' => 'Description Ge',
            'keyword_ge' => 'Keyword Ge',
        ];
    }
}
