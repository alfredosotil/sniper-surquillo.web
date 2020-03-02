<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use phpDocumentor\Reflection\Types\This;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%competitor}}".
 *
 * @property int $id
 * @property int $team_id
 * @property string $firstname
 * @property string|null $middlename
 * @property string $lastname
 * @property string $picture
 * @property string|null $avatar_path
 * @property string|null $avatar_base_url
 * @property string $email
 * @property string $phone_number
 * @property string $birthday
 * @property int|null $total_points
 * @property int|null $gender
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
 * @property Team $team
 * @property EventCompetitor[] $eventCompetitors
 */
class Competitor extends \yii\db\ActiveRecord
{

    /**
     * @var
     */
    public $picture;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%competitor}}';
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
                'attribute' => 'picture',
                'pathAttribute' => 'avatar_path',
                'baseUrlAttribute' => 'avatar_base_url'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'firstname', 'lastname', 'email', 'phone_number', 'birthday', 'weight', 'belt', 'division'], 'required'],
            [['team_id', 'total_points', 'gender', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['weight'], 'number'],
            [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url', 'email', 'belt', 'division'], 'string', 'max' => 255],
            [['phone_number', 'birthday'], 'string', 'max' => 32],
            [['uuid'], 'string', 'max' => 36],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::class, 'targetAttribute' => ['team_id' => 'id']],
            ['email', 'email'],
            ['picture', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'team_id' => Yii::t('common', 'Team ID'),
            'firstname' => Yii::t('common', 'Firstname'),
            'middlename' => Yii::t('common', 'Middlename'),
            'lastname' => Yii::t('common', 'Lastname'),
            'picture' => Yii::t('common', 'Picture'),
            'avatar_path' => Yii::t('common', 'Avatar Path'),
            'avatar_base_url' => Yii::t('common', 'Avatar Base Url'),
            'email' => Yii::t('common', 'Email'),
            'phone_number' => Yii::t('common', 'Phone Number'),
            'birthday' => Yii::t('common', 'Birthday'),
            'total_points' => Yii::t('common', 'Total Points'),
            'gender' => Yii::t('common', 'Gender'),
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
     * Gets query for [[Team]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TeamQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::class, ['id' => 'team_id']);
    }

    /**
     * Gets query for [[EventCompetitors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventCompetitorQuery
     */
    public function getEventCompetitors()
    {
        return $this->hasMany(EventCompetitor::class, ['competitor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CompetitorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompetitorQuery(get_called_class());
    }

    /**
     * @param null $default
     * @return bool|null|string
     */
    public function getAvatar($default = null)
    {
        return $this->avatar_path
            ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
            : $default;
    }

    /**
     * @return null|string
     */
    public function getFullNameAndEmail()
    {
        if ($this->firstname || $this->lastname || $this->middlename || $this->email) {
            return $this->firstname . ' ' . $this->middlename . ' ' . $this->lastname . ' - ' . $this->email;
        }
        return null;
    }
}
