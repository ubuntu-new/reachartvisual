<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact_title".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $status
 * @property string $description
 * @property string $created
 * @property string $quote
 * @property string $keywords
 * @property string $title_ge
 * @property string $description_ge
 * @property string $keyword_ge
 */
class ContactTitle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_title';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'description', 'keywords', 'description_ge', 'keyword_ge'], 'string'],
            [['title', 'title_ge', ], 'required'],
            [['created'], 'safe'],
            [['title', 'quote', 'title_ge'], 'string', 'max' => 255],
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
            'created' => 'Created',
            'quote' => 'Quote',
            'keywords' => 'Keywords',
            'title_ge' => 'Title Ge',
            'description_ge' => 'Description Ge',
            'keyword_ge' => 'Keyword Ge',
        ];
    }
}
