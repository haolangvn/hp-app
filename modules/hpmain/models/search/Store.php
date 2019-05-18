<?php

namespace hp\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use hp\models\Store as StoreModel;

/**
 * Store represents the model behind the search form of `app\modules\hpmain\models\Store`.
 */
class Store extends StoreModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'weight', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'alias', 'phone', 'email', 'address', 'image', 'system', 'province', 'region', 'content'], 'safe'],
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
        $query = StoreModel::find();

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
            'status' => $this->status,
            'weight' => $this->weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'system', $this->system])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}