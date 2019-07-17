<?php

namespace hpmain\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use hpmain\models\base\Setting;

/**
 * Setting represents the model behind the search form of `hpmain\models\Setting`.
 */
class SettingSearch extends Setting {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'name', 'value', 'type'], 'safe'],
            [['created_at', 'updated_at', 'lang_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Setting::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'value', $this->value])
                ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }

}
