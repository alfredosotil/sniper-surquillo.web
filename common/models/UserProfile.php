<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_profile}}".
 *
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $middlename
 * @property string|null $lastname
 * @property string|null $avatar_path
 * @property string|null $avatar_base_url
 * @property string|null $phone_number
 * @property string|null $birthday
 * @property int|null $total_points
 * @property int|null $stamina
 * @property int|null $guard
 * @property int|null $pass
 * @property int|null $takedown
 * @property int|null $submission
 * @property string $locale
 * @property int|null $gender
 *
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @var
     */
    public $picture;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => \trntv\filekit\behaviors\UploadBehavior::class,
                'attribute' => 'picture',
                'pathAttribute' => 'avatar_path',
                'baseUrlAttribute' => 'avatar_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_points', 'stamina', 'guard', 'pass', 'takedown', 'submission', 'gender'], 'integer'],
            [['locale'], 'required'],
            [['gender'], 'in', 'range' => [NULL, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url'], 'string', 'max' => 255],
            [['phone_number', 'birthday', 'locale'], 'string', 'max' => 32],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            ['picture', 'safe']
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'firstname' => Yii::t('common', 'Firstname'),
            'middlename' => Yii::t('common', 'Middlename'),
            'lastname' => Yii::t('common', 'Lastname'),
            'avatar_path' => Yii::t('common', 'Avatar Path'),
            'avatar_base_url' => Yii::t('common', 'Avatar Base Url'),
            'phone_number' => Yii::t('common', 'Phone Number'),
            'birthday' => Yii::t('common', 'Birthday'),
            'total_points' => Yii::t('common', 'Total Points'),
            'stamina' => Yii::t('common', 'Stamina'),
            'guard' => Yii::t('common', 'Guard'),
            'pass' => Yii::t('common', 'Pass'),
            'takedown' => Yii::t('common', 'Takedown'),
            'submission' => Yii::t('common', 'Submission'),
            'locale' => Yii::t('common', 'Locale'),
            'gender' => Yii::t('common', 'Gender'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserProfileQuery(get_called_class());
    }

    /**
     * @return null|string
     */
    public function getFullName()
    {
        if ($this->firstname || $this->lastname) {
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        return null;
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
}
