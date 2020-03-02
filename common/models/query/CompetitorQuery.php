<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Competitor]].
 *
 * @see \common\models\Competitor
 */
class CompetitorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Competitor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Competitor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
