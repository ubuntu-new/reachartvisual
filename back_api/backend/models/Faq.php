<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $status
 * @property string $description
 * @property string $created
 * @property int $user_id
 * @property string $title_ge
 * @property string $description_ge
 * @property string $metakeyword
 * @property string $metakeyword_ge
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'description', 'description_ge', 'metakeyword', 'metakeyword_ge'], 'string'],
            [['description','title_ge','title','description_ge'], 'required'],
            [['created'], 'safe'],
            [['user_id'], 'integer'],
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
            'created' => 'Created',
            'user_id' => 'User ID',
            'title_ge' => 'Title Ge',
            'description_ge' => 'Description Ge',
            'metakeyword' => 'Metakeyword',
            'metakeyword_ge' => 'Metakeyword Ge',
        ];
    }
}
