<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[UserAssistance]].
 *
 * @see UserAssistance
 */
class UserAssistanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserAssistance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserAssistance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
