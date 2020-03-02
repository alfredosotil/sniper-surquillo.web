<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use common\models\query\GymDisciplineQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%gym_discipline}}".
 *
 * @property int $id
 * @property string $image
 * @property string|null $image_path
 * @property string|null $image_base_url
 * @property string|null $name
 * @property string|null $description
 * @property int|null $points
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Schedule[] $schedules
 * @property UserAssistance[] $userAssistances
 */
class GymDiscipline extends \yii\db\ActiveRecord
{

    /**
     * @var
     */
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gym_discipline}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            UUIDBehavior::class,
            'picture' => [
                'class' => UploadBehavior::class,
                'attribute' => 'image',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['points', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['image_path', 'image_base_url'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['uuid'], 'string', 'max' => 36],
            ['image', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'image_path' => Yii::t('common', 'Image Path'),
            'image_base_url' => Yii::t('common', 'Image Base Url'),
            'name' => Yii::t('common', 'Name'),
            'description' => Yii::t('common', 'Description'),
            'points' => Yii::t('common', 'Points'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'Image' => Yii::t('common', 'Image'),
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery|ScheduleQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['gym_discipline_id' => 'id']);
    }

    /**
     * Gets query for [[UserAssistances]].
     *
     * @return \yii\db\ActiveQuery|UserAssistanceQuery
     */
    public function getUserAssistances()
    {
        return $this->hasMany(UserAssistance::class, ['gym_discipline_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GymDisciplineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GymDisciplineQuery(get_called_class());
    }
}
