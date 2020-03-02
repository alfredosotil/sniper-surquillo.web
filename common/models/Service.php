<?php

namespace common\models;

use common\behaviors\UUIDBehavior;
use common\models\query\ServiceQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property float $price
 * @property string $short_description
 * @property string $full_description
 * @property int|null $points
 * @property int $duration
 * @property string|null $image_path
 * @property string|null $image_base_url
 * @property int $stock
 * @property int $active
 * @property string|null $uuid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Service extends \yii\db\ActiveRecord
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
        return '{{%service}}';
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
            [['name', 'short_description', 'full_description', 'duration'], 'required'],
            [['price'], 'number'],
            [['points', 'duration', 'stock', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'short_description', 'full_description', 'image_path', 'image_base_url'], 'string', 'max' => 255],
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
            'name' => Yii::t('common', 'Name'),
            'price' => Yii::t('common', 'Price'),
            'short_description' => Yii::t('common', 'Short Description'),
            'full_description' => Yii::t('common', 'Full Description'),
            'points' => Yii::t('common', 'Points'),
            'duration' => Yii::t('common', 'Duration'),
            'image_path' => Yii::t('common', 'Image Path'),
            'image_base_url' => Yii::t('common', 'Image Base Url'),
            'stock' => Yii::t('common', 'Stock'),
            'active' => Yii::t('common', 'Active'),
            'uuid' => Yii::t('common', 'Uuid'),
            'created_by' => Yii::t('common', 'Created By'),
            'updated_by' => Yii::t('common', 'Updated By'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'Image' => Yii::t('common', 'Image'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceQuery(get_called_class());
    }

    /**
     * @return null|string
     */
    public function getNamePriceAndDuration()
    {
        if ($this->name || $this->duration || $this->price) {
            return $this->name . ' - ' . $this->price . ' soles - ' . $this->duration . ' days';
        }
        return null;
    }
}
