<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserHistory;

/**
 * UserHistorySearch represents the model behind the search form about `common\models\UserHistory`.
 */
class UserHistorySearch extends UserHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'is_allergic', 'weight', 'height', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['description', 'indications', 'uuid'], 'safe'],
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
        $query = UserHistory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'is_allergic' => $this->is_allergic,
            'weight' => $this->weight,
            'height' => $this->height,
            'active' => $this->active,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'indications', $this->indications])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
