<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use common\models\query\UserAssistanceQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_assistance}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $gym_discipline_id
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property GymDiscipline $gymDiscipline
 * @property User $user
 */
class UserAssistance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_assistance}}';
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
            [['user_id', 'gym_discipline_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['uuid'], 'string', 'max' => 36],
            [['gym_discipline_id'], 'exist', 'skipOnError' => true, 'targetClass' => GymDiscipline::class, 'targetAttribute' => ['gym_discipline_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'gym_discipline_id' => Yii::t('common', 'Gym Discipline ID'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[GymDiscipline]].
     *
     * @return \yii\db\ActiveQuery|GymDisciplineQuery
     */
    public function getGymDiscipline()
    {
        return $this->hasOne(GymDiscipline::class, ['id' => 'gym_discipline_id']);
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
     * @return UserAssistanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserAssistanceQuery(get_called_class());
    }
}
