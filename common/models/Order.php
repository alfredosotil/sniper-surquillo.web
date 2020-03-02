<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $optional_client_name
 * @property float $amount
 * @property string|null $phone_number
 * @property string|null $email
 * @property float $tax
 * @property int $is_paid
 * @property int $type_payment
 * @property string|null $annotations
 * @property int $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 * @property OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    const CASH = 1;
    const CREDIT_CARD = 2;
    const TRANSFER = 3;
    const YAPE = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
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
            [['user_id', 'is_paid', 'type_payment', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['amount'], 'required'],
            [['amount', 'tax'], 'number'],
            [['annotations'], 'string'],
            [['optional_client_name', 'phone_number', 'email'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => Yii::t('common', 'User ID'),
            'optional_client_name' => Yii::t('common', 'Optional Client Name'),
            'amount' => Yii::t('common', 'Amount'),
            'phone_number' => Yii::t('common', 'Phone Number'),
            'email' => Yii::t('common', 'Email'),
            'tax' => Yii::t('common', 'Tax'),
            'is_paid' => Yii::t('common', 'Is Paid'),
            'type_payment' => Yii::t('common', 'Type Payment'),
            'annotations' => Yii::t('common', 'Annotations'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
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
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrderDetailQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrderQuery(get_called_class());
    }

    /**
     * @return null|string
     */
    public function getIdAndDate()
    {
        if ($this->id || $this->created_at) {
            return $this->id . ' - ' . Yii::$app->formatter->asDatetime($this->created_at);
        }
        return null;
    }}
