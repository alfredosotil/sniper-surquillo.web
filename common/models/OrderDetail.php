<?php

namespace common\models;

use Yii;
use \common\models\base\OrderDetail as BaseOrderDetail;

/**
 * This is the model class for table "order_detail".
 */
class OrderDetail extends BaseOrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['class_id', 'class_type', 'order_id', 'description'], 'required'],
            [['class_id', 'order_id', 'qty', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['price_per_unit', 'price', 'tax', 'vat'], 'number'],
            [['class_type', 'description'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'class_id' => Yii::t('app', 'Class ID'),
            'class_type' => Yii::t('app', 'Class Type'),
            'order_id' => Yii::t('app', 'Order ID'),
            'description' => Yii::t('app', 'Description'),
            'price_per_unit' => Yii::t('app', 'Price Per Unit'),
            'price' => Yii::t('app', 'Price'),
            'tax' => Yii::t('app', 'Tax'),
            'vat' => Yii::t('app', 'Vat'),
            'qty' => Yii::t('app', 'Qty'),
            'is_active' => Yii::t('app', 'Is Active'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
