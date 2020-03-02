<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderDetail;

/**
 * OrderDetailSearch represents the model behind the search form about `common\models\OrderDetail`.
 */
class OrderDetailSearch extends OrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'class_id', 'order_id', 'qty', 'active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['class_type', 'description', 'uuid'], 'safe'],
            [['price_per_unit', 'price', 'tax', 'vat'], 'number'],
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
        $query = OrderDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'class_id' => $this->class_id,
            'order_id' => $this->order_id,
            'price_per_unit' => $this->price_per_unit,
            'price' => $this->price,
            'tax' => $this->tax,
            'vat' => $this->vat,
            'qty' => $this->qty,
            'active' => $this->active,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'class_type', $this->class_type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
