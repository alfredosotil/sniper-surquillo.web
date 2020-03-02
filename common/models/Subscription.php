<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use kartik\daterange\DateRangeBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%subscription}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property string $date_range
 * @property int $starts_at
 * @property int $ends_at
 * @property int $subscription_state_id
 * @property int|null $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Service $service
 * @property User $user
 */
class Subscription extends \yii\db\ActiveRecord
{

    /**
     * @var
     */
    public $date_range;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subscription}}';
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
            [['user_id', 'service_id', 'date_range', 'starts_at', 'ends_at'], 'required'],
            [['user_id', 'service_id', 'starts_at', 'ends_at', 'subscription_state_id', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['uuid'], 'string', 'max' => 36],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['date_range'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'user_id' => Yii::t('common', 'User ID'),
            'service_id' => Yii::t('common', 'Service ID'),
            'starts_at' => Yii::t('common', 'Starts At'),
            'ends_at' => Yii::t('common', 'Ends At'),
            'subscription_state_id' => Yii::t('common', 'Subscription State ID'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ServiceQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SubscriptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SubscriptionQuery(get_called_class());
    }
}
