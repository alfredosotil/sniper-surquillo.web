<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $optional_client_name
 * @property double $amount
 * @property string $phone_number
 * @property string $email
 * @property double $tax
 * @property integer $is_paid
 * @property integer $type_payment
 * @property string $notes
 * @property integer $is_active
 * @property string $uuid
 * @property integer $lock
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property \common\models\User $user
 * @property \common\models\OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => new \yii\db\Expression('NOW()'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'user',
            'orderDetails'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'is_paid', 'type_payment', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['amount'], 'required'],
            [['amount', 'tax'], 'number'],
            [['optional_client_name', 'phone_number', 'email', 'notes'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(\common\models\OrderDetail::className(), ['order_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'uuid',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \common\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\query\OrderQuery(get_called_class());
        return $query->where(['order.deleted_by' => 0]);
    }
}
