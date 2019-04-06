<?php

namespace app\modules\demo\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\demo\models\Demo as DemoModel;

/**
 * Demo represents the model behind the search form of `app\modules\demo\models\Demo`.
 */
class Demo extends DemoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'desc', 'deadline'], 'safe'],
            ['deadline', 'default', 'value' => null],
            // validate the date and overwrite `deadline` with the unix timestamp
//            ['deadline', 'date', 'timestampAttribute' => 'deadline'],
        ];
    }

    /**
     * @inheritdoc
     */
//    public function scenarios()
//    {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DemoModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id
        ]);
        $this->addCompareTimeToQuery($query, 'deadline', $this->deadline);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}