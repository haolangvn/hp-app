<?php

namespace hp\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use hp\models\Language as LanguageModel;

/**
 * Language represents the model behind the search form of `hp\models\Language`.
 */
class Language extends LanguageModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'native'], 'safe'],
            [['is_default'], 'integer'],
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
        $query = LanguageModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'is_default' => $this->is_default,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'native', $this->native]);

        return $dataProvider;
    }
}