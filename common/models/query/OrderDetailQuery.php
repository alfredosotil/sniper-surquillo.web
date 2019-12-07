<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\query\OrderDetail]].
 *
 * @see \common\models\query\OrderDetail
 */
class OrderDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\query\OrderDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\OrderDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
