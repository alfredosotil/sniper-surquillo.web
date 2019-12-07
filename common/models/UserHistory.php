<?php

namespace common\models;

use Yii;
use \common\models\base\UserHistory as BaseUserHistory;

/**
 * This is the model class for table "user_history".
 */
class UserHistory extends BaseUserHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['is_allergic', 'weight', 'size', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['description', 'indications', 'weight', 'size'], 'required'],
            [['description', 'indications'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('app', 'User ID'),
            'is_allergic' => Yii::t('app', 'Is Allergic'),
            'description' => Yii::t('app', 'Description'),
            'indications' => Yii::t('app', 'Indications'),
            'weight' => Yii::t('app', 'Weight'),
            'size' => Yii::t('app', 'Size'),
            'is_active' => Yii::t('app', 'Is Active'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
