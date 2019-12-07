<?php

namespace common\models;

use Yii;
use \common\models\base\Order as BaseOrder;

/**
 * This is the model class for table "order".
 */
class Order extends BaseOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'is_paid', 'type_payment', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['amount'], 'required'],
            [['amount', 'tax'], 'number'],
            [['optional_client_name', 'phone_number', 'email', 'notes'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('app', 'User ID'),
            'optional_client_name' => Yii::t('app', 'Optional Client Name'),
            'amount' => Yii::t('app', 'Amount'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'email' => Yii::t('app', 'Email'),
            'tax' => Yii::t('app', 'Tax'),
            'is_paid' => Yii::t('app', 'Is Paid'),
            'type_payment' => Yii::t('app', 'Type Payment'),
            'notes' => Yii::t('app', 'Notes'),
            'is_active' => Yii::t('app', 'Is Active'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
