<?php

namespace common\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class UUIDBehavior
 * @package app\components
 */
class UUIDBehavior extends Behavior {
    /**
     * Field/Column
     * Default -> uuid
     * @var type
     */
    public $attribute = 'uuid';

    /**
     * @return array
     */
    public function events() {
        return[
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
        ];
    }

    /**
     * set beforeSave() -> UUID data
     */
    public function beforeSave() {
        $this->owner->{$this->attribute} = $this->owner->getDb()->createCommand("SELECT UUID()")->queryScalar();
    }

}
