<?php

namespace common\models;

use Yii;
use \common\models\base\Service as BaseService;

/**
 * This is the model class for table "service".
 */
class Service extends BaseService
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'short_description', 'description', 'duration'], 'required'],
            [['price'], 'number'],
            [['points', 'duration', 'stock', 'is_active', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['name', 'short_description', 'description', 'image_path', 'image_base_url'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'short_description' => Yii::t('app', 'Short Description'),
            'description' => Yii::t('app', 'Description'),
            'points' => Yii::t('app', 'Points'),
            'duration' => Yii::t('app', 'Duration'),
            'image_path' => Yii::t('app', 'Image Path'),
            'image_base_url' => Yii::t('app', 'Image Base Url'),
            'stock' => Yii::t('app', 'Stock'),
            'is_active' => Yii::t('app', 'Is Active'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
