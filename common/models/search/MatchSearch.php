<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Match;

/**
 * MatchSearch represents the model behind the search form about `common\models\Match`.
 */
class MatchSearch extends Match
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_competitor1_id', 'event_competitor2_id', 'event_competitor_winner_id', 'event_category_id', 'points', 'submission', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['annotations', 'uuid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Match::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'event_competitor1_id' => $this->event_competitor1_id,
            'event_competitor2_id' => $this->event_competitor2_id,
            'event_competitor_winner_id' => $this->event_competitor_winner_id,
            'event_category_id' => $this->event_category_id,
            'points' => $this->points,
            'submission' => $this->submission,
            'active' => $this->active,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'annotations', $this->annotations])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
