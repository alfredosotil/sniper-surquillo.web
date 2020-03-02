<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event_category}}".
 *
 * @property int $id
 * @property int $event_id
 * @property float $weight
 * @property string $belt
 * @property string $division
 * @property int|null $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Event $event
 * @property Match[] $matches
 */
class EventCategory extends \yii\db\ActiveRecord
{

    const CHILDREN = 1;
    const ADULT = 2;
    const MASTER = 3;
    const SPECIAL = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_category}}';
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
            [['event_id', 'weight', 'belt', 'division'], 'required'],
            [['event_id', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['weight'], 'number'],
            [['belt', 'division'], 'string', 'max' => 255],
            [['uuid'], 'string', 'max' => 36],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::class, 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'event_id' => Yii::t('common', 'Event ID'),
            'weight' => Yii::t('common', 'Weight'),
            'belt' => Yii::t('common', 'Belt'),
            'division' => Yii::t('common', 'Division'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::class, ['id' => 'event_id']);
    }

    /**
     * Gets query for [[Matches]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MatchQuery
     */
    public function getMatches()
    {
        return $this->hasMany(Match::class, ['event_category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EventCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EventCategoryQuery(get_called_class());
    }
}
