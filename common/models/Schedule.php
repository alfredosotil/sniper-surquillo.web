<?php

namespace common\models;

use Yii;
use \common\models\base\Schedule as BaseSchedule;

/**
 * This is the model class for table "schedule".
 */
class Schedule extends BaseSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['gym_discipline_id', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['day_of_week', 'start_hour', 'end_hour'], 'required'],
            [['day_of_week', 'start_hour', 'end_hour'], 'string', 'max' => 255],
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
            'id' => Yii::t('app', 'ID'),
            'gym_discipline_id' => Yii::t('app', 'Gym Discipline ID'),
            'day_of_week' => Yii::t('app', 'Day Of Week'),
            'start_hour' => Yii::t('app', 'Start Hour'),
            'end_hour' => Yii::t('app', 'End Hour'),
            'is_active' => Yii::t('app', 'Is Active'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
