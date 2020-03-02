<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $id
 * @property string $name
 * @property string $short_description
 * @property string $full_description
 * @property string|null $annotations
 * @property string $address_reference
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int $start_at
 * @property int|null $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property EventCategory[] $eventCategories
 * @property EventCompetitor[] $eventCompetitors
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event}}';
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
            [['name', 'short_description', 'full_description', 'address_reference', 'start_at'], 'required'],
            [['full_description', 'annotations'], 'string'],
            [['start_at', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['short_description', 'address_reference'], 'string', 'max' => 300],
            [['latitude', 'longitude'], 'string', 'max' => 30],
            [['uuid'], 'string', 'max' => 36],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'short_description' => Yii::t('common', 'Short Description'),
            'full_description' => Yii::t('common', 'Full Description'),
            'annotations' => Yii::t('common', 'Annotations'),
            'address_reference' => Yii::t('common', 'Address Reference'),
            'latitude' => Yii::t('common', 'Latitude'),
            'longitude' => Yii::t('common', 'Longitude'),
            'start_at' => Yii::t('common', 'Start At'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[EventCategories]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCategoryQuery
     */
    public function getEventCategories()
    {
        return $this->hasMany(EventCategory::class, ['event_id' => 'id']);
    }

    /**
     * Gets query for [[EventCompetitors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCompetitorQuery
     */
    public function getEventCompetitors()
    {
        return $this->hasMany(EventCompetitor::class, ['event_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EventQuery(get_called_class());
    }
}
