<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $orderData
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $statuss
 * @property string|null $visible
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'orderData', 'created_at'], 'required'],
            [['customer_id'], 'integer'],
            [['orderData', 'statuss', 'visible'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'orderData' => Yii::t('app', 'Order Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'statuss' => Yii::t('app', 'Statuss'),
            'visible' => Yii::t('app', 'Visible'),
        ];
    }
}
