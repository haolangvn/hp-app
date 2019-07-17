<?php

namespace hpmain\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use hpmain\models\Store;

/**
 * StoreSearch represents the model behind the search form of `hpmain\models\Store`.
 */
class StoreSearch extends Store {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sort_order', 'is_hidden', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'alias', 'phone', 'address', 'email', 'image', 'coordinates', 'province', 'region', 'system', 'content'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Store::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sort_order' => $this->sort_order,
            'is_hidden' => $this->is_hidden,
            'is_deleted' => $this->is_deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'alias', $this->alias])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'coordinates', $this->coordinates])
                ->andFilterWhere(['like', 'province', $this->province])
                ->andFilterWhere(['like', 'region', $this->region])
                ->andFilterWhere(['like', 'system', $this->system])
                ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }

}
