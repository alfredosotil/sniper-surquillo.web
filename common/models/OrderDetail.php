<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use common\models\query\OrderDetailQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%order_detail}}".
 *
 * @property int $id
 * @property int $class_id
 * @property string $class_type
 * @property int $order_id
 * @property string $description
 * @property float $price_per_unit
 * @property float $price
 * @property float $tax
 * @property float $vat
 * @property int $qty
 * @property int $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Order $order
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    const PRODUCT = 1;
    const SERVICE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_detail}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            UUIDBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_id', 'class_type', 'order_id', 'description'], 'required'],
            [['class_id', 'order_id', 'qty', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['price_per_unit', 'price', 'tax', 'vat'], 'number'],
            [['class_type', 'description'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'class_id' => Yii::t('common', 'Class ID'),
            'class_type' => Yii::t('common', 'Class Type'),
            'order_id' => Yii::t('common', 'Order ID'),
            'description' => Yii::t('common', 'Description'),
            'price_per_unit' => Yii::t('common', 'Price Per Unit'),
            'price' => Yii::t('common', 'Price'),
            'tax' => Yii::t('common', 'Tax'),
            'vat' => Yii::t('common', 'Vat'),
            'qty' => Yii::t('common', 'Qty'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery|OrderQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     * @return OrderDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderDetailQuery(get_called_class());
    }
}
