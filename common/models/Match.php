<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%match}}".
 *
 * @property int $id
 * @property int $event_competitor1_id
 * @property int $event_competitor2_id
 * @property int $event_competitor_winner_id
 * @property int $event_category_id
 * @property int|null $points
 * @property int|null $submission
 * @property string|null $annotations
 * @property int|null $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property EventCategory $eventCategory
 * @property EventCompetitor $eventCompetitor1
 * @property EventCompetitor $eventCompetitor2
 * @property EventCompetitor $eventCompetitorWinner
 */
class Match extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%match}}';
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
            [['event_competitor1_id', 'event_competitor2_id', 'event_competitor_winner_id', 'event_category_id'], 'required'],
            [['event_competitor1_id', 'event_competitor2_id', 'event_competitor_winner_id', 'event_category_id', 'points', 'submission', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['annotations'], 'string'],
            [['uuid'], 'string', 'max' => 36],
            [['event_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCategory::class, 'targetAttribute' => ['event_category_id' => 'id']],
            [['event_competitor1_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCompetitor::class, 'targetAttribute' => ['event_competitor1_id' => 'id']],
            [['event_competitor2_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCompetitor::class, 'targetAttribute' => ['event_competitor2_id' => 'id']],
            [['event_competitor_winner_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCompetitor::class, 'targetAttribute' => ['event_competitor_winner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'event_competitor1_id' => Yii::t('common', 'Event Competitor1 ID'),
            'event_competitor2_id' => Yii::t('common', 'Event Competitor2 ID'),
            'event_competitor_winner_id' => Yii::t('common', 'Event Competitor Winner ID'),
            'event_category_id' => Yii::t('common', 'Event Category ID'),
            'points' => Yii::t('common', 'Points'),
            'submission' => Yii::t('common', 'Submission'),
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
     * Gets query for [[EventCategory]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCategoryQuery
     */
    public function getEventCategory()
    {
        return $this->hasOne(EventCategory::class, ['id' => 'event_category_id']);
    }

    /**
     * Gets query for [[EventCompetitor1]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCompetitorQuery
     */
    public function getEventCompetitor1()
    {
        return $this->hasOne(EventCompetitor::class, ['id' => 'event_competitor1_id']);
    }

    /**
     * Gets query for [[EventCompetitor2]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCompetitorQuery
     */
    public function getEventCompetitor2()
    {
        return $this->hasOne(EventCompetitor::class, ['id' => 'event_competitor2_id']);
    }

    /**
     * Gets query for [[EventCompetitorWinner]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCompetitorQuery
     */
    public function getEventCompetitorWinner()
    {
        return $this->hasOne(EventCompetitor::class, ['id' => 'event_competitor_winner_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MatchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MatchQuery(get_called_class());
    }
}
