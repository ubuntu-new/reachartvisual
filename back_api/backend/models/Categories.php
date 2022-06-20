<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name
 * @property string $name_ge
 * @property int $mine
 * @property string $visible
 * @property string $comm
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_ge'], 'required'],
            [['mine', 'comm'], 'safe'],
            [['visible'], 'string'],
            [['name'], 'string', 'max' => 80],
            [['name_ge'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_ge' => 'Name Ge',
            'mine' => 'Mine',
            'visible' => 'Visible',
            'comm' => 'Comm',
        ];
    }
}
