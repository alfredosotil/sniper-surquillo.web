<?php

namespace common\models;

use Yii;
use \common\models\base\UserProfile as BaseUserProfile;

class UserProfile extends BaseUserProfile
{
    /*
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
            [
                [['total_points', 'gender', 'user_id'], 'integer'],
                [['locale'], 'required'],
                [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url'], 'string', 'max' => 255],
                [['phone_number', 'birthday', 'locale'], 'string', 'max' => 32],
                [['lock'], 'default', 'value' => '0'],
                [['lock'], 'mootensai\components\OptimisticLockValidator']
            ]);
    }

    /*
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'middlename' => Yii::t('app', 'Middlename'),
            'lastname' => Yii::t('app', 'Lastname'),
            'avatar_path' => Yii::t('app', 'Avatar Path'),
            'avatar_base_url' => Yii::t('app', 'Avatar Base Url'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'birthday' => Yii::t('app', 'Birthday'),
            'total_points' => Yii::t('app', 'Total Points'),
            'locale' => Yii::t('app', 'Locale'),
            'gender' => Yii::t('app', 'Gender'),
        ];
    }
}
