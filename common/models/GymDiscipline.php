<?php

namespace common\models;

use Yii;
use \common\models\base\GymDiscipline as BaseGymDiscipline;

/**
 * This is the model class for table "gym_discipline".
 */
class GymDiscipline extends BaseGymDiscipline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['points', 'lock', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['image_path', 'image_base_url'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
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
            'image_path' => Yii::t('app', 'Image Path'),
            'image_base_url' => Yii::t('app', 'Image Base Url'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'points' => Yii::t('app', 'Points'),
            'uuid' => Yii::t('app', 'Uuid'),
            'lock' => Yii::t('app', 'Lock'),
        ];
    }
}
