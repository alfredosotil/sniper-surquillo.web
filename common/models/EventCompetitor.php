<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event_competitor}}".
 *
 * @property int $id
 * @property int $event_id
 * @property int $competitor_id
 *
 * @property Competitor $competitor
 * @property Event $event
 * @property Match[] $matches
 * @property Match[] $matches0
 * @property Match[] $matches1
 */
class EventCompetitor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event_competitor}}';
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
            [['event_id', 'competitor_id'], 'required'],
            [['event_id', 'competitor_id'], 'integer'],
            [['competitor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Competitor::class, 'targetAttribute' => ['competitor_id' => 'id']],
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
            'competitor_id' => Yii::t('common', 'Competitor ID'),
        ];
    }

    /**
     * Gets query for [[Competitor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CompetitorQuery
     */
    public function getCompetitor()
    {
        return $this->hasOne(Competitor::class, ['id' => 'competitor_id']);
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
        return $this->hasMany(Match::class, ['event_competitor1_id' => 'id']);
    }

    /**
     * Gets query for [[Matches0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MatchQuery
     */
    public function getMatches0()
    {
        return $this->hasMany(Match::class, ['event_competitor2_id' => 'id']);
    }

    /**
     * Gets query for [[Matches1]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MatchQuery
     */
    public function getMatches1()
    {
        return $this->hasMany(Match::class, ['event_competitor_winner_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EventCompetitorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EventCompetitorQuery(get_called_class());
    }
}
