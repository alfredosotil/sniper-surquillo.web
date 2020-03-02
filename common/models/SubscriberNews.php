<?php

namespace common\models;

use common\models\query\SubscriberNewsQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%subscriber_news}}".
 *
 * @property int $id
 * @property string $email
 * @property string|null $phone_number
 * @property int|null $created_at
 * @property int $is_active
 */
class SubscriberNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subscriber_news}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['created_at', 'is_active'], 'integer'],
            [['email', 'phone_number'], 'string', 'max' => 255],
            [['email'], 'unique'],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'email' => Yii::t('common', 'Email'),
            'phone_number' => Yii::t('common', 'Phone Number'),
            'created_at' => Yii::t('common', 'Created At'),
            'is_active' => Yii::t('common', 'Is Active'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SubscriberNewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubscriberNewsQuery(get_called_class());
    }
}
