<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%team}}".
 *
 * @property int $id
 * @property string $name
 * @property string $short_description
 * @property string $full_description
 * @property string $phone_number
 * @property string $email
 * @property string|null $web
 * @property string $person_in_charge
 * @property int|null $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Competitor[] $competitors
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%team}}';
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
            [['name', 'short_description', 'full_description', 'phone_number', 'email', 'person_in_charge'], 'required'],
            [['full_description'], 'string'],
            [['active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'phone_number', 'email', 'web', 'person_in_charge'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 300],
            [['uuid'], 'string', 'max' => 36],
            ['email', 'email'],
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
            'phone_number' => Yii::t('common', 'Phone Number'),
            'email' => Yii::t('common', 'Email'),
            'web' => Yii::t('common', 'Web'),
            'person_in_charge' => Yii::t('common', 'Person In Charge'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Competitors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CompetitorQuery
     */
    public function getCompetitors()
    {
        return $this->hasMany(Competitor::class, ['team_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TeamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TeamQuery(get_called_class());
    }
}
