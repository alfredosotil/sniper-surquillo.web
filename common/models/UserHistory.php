<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use common\models\query\UserHistoryQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_history}}".
 *
 * @property int $user_id
 * @property int $is_allergic
 * @property string $description
 * @property string $indications
 * @property int $weight
 * @property int $height
 * @property int $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 */
class UserHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_history}}';
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
            [['is_allergic', 'weight', 'height', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['description', 'indications', 'weight', 'height'], 'required'],
            [['description', 'indications'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'is_allergic' => Yii::t('common', 'Is Allergic'),
            'description' => Yii::t('common', 'Description'),
            'indications' => Yii::t('common', 'Indications'),
            'weight' => Yii::t('common', 'Weight'),
            'height' => Yii::t('common', 'Height'),
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
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserHistoryQuery(get_called_class());
    }
}
