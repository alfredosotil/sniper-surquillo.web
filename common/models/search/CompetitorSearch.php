<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Competitor;

/**
 * CompetitorSearch represents the model behind the search form about `common\models\Competitor`.
 */
class CompetitorSearch extends Competitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'team_id', 'total_points', 'gender', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url', 'email', 'phone_number', 'birthday', 'belt', 'division', 'uuid'], 'safe'],
            [['weight'], 'number'],
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
        $query = Competitor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'team_id' => $this->team_id,
            'total_points' => $this->total_points,
            'gender' => $this->gender,
            'weight' => $this->weight,
            'active' => $this->active,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'avatar_path', $this->avatar_path])
            ->andFilterWhere(['like', 'avatar_base_url', $this->avatar_base_url])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'belt', $this->belt])
            ->andFilterWhere(['like', 'division', $this->division])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
