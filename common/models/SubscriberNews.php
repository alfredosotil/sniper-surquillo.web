<?php

namespace common\models;

use Yii;
use \common\models\base\SubscriberNews as BaseSubscriberNews;

/**
 * This is the model class for table "subscriber_news".
 */
class SubscriberNews extends BaseSubscriberNews
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['email'], 'required'],
            [['created_at', 'is_active'], 'integer'],
            [['email', 'phone_number'], 'string', 'max' => 255],
            [['email'], 'unique']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
