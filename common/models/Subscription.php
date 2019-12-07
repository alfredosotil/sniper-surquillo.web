<?php

namespace common\models;

use Yii;
use \common\models\base\Subscription as BaseSubscription;

/**
 * This is the model class for table "subscription".
 */
class Subscription extends BaseSubscription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'service_id', 'starts_at', 'ends_at'], 'required'],
            [['user_id', 'service_id', 'starts_at', 'ends_at', 'subscription_state_id', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
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
            'service_id' => Yii::t('app', 'Service ID'),
            'starts_at' => Yii::t('app', 'Starts At'),
            'ends_at' => Yii::t('app', 'Ends At'),
            'subscription_state_id' => Yii::t('app', 'Subscription State ID'),
            'is_active' => Yii::t('app', 'Is Active'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
