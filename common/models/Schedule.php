<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use common\models\query\ScheduleQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%schedule}}".
 *
 * @property int $id
 * @property int|null $gym_discipline_id
 * @property string $day_of_week
 * @property string $start_hour
 * @property string $end_hour
 * @property int $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property GymDiscipline $gymDiscipline
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%schedule}}';
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
            [['gym_discipline_id', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['day_of_week', 'start_hour', 'end_hour'], 'required'],
            [['day_of_week', 'start_hour', 'end_hour'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['gym_discipline_id'], 'exist', 'skipOnError' => true, 'targetClass' => GymDiscipline::class, 'targetAttribute' => ['gym_discipline_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'gym_discipline_id' => Yii::t('common', 'Gym Discipline ID'),
            'day_of_week' => Yii::t('common', 'Day Of Week'),
            'start_hour' => Yii::t('common', 'Start Hour'),
            'end_hour' => Yii::t('common', 'End Hour'),
            'active' => Yii::t('common', 'Active'),
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
     * {@inheritdoc}
     * @return ScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScheduleQuery(get_called_class());
    }
}
