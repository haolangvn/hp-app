<?php

namespace app\modules\ecommerce\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecommerce\models\Order as OrderModel;

/**
 * Order represents the model behind the search form of `app\modules\ecommerce\models\Order`.
 */
class Order extends OrderModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ocustomer_id', 'oshipment_id', 'shipping_cost', 'total', 'cost', 'discount', 'isSync', 'promotion_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['billing', 'note', 'note_admin', 'payment', 'payment_status', 'device', 'channel'], 'safe'],
            [['discount_per'], 'number'],
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
        $query = OrderModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

//        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
//            return $dataProvider;
//        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ocustomer_id' => $this->ocustomer_id,
            'oshipment_id' => $this->oshipment_id,
            'shipping_cost' => $this->shipping_cost,
            'total' => $this->total,
            'cost' => $this->cost,
            'discount' => $this->discount,
            'discount_per' => $this->discount_per,
            'isSync' => $this->isSync,
            'promotion_type' => $this->promotion_type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'billing', $this->billing])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'note_admin', $this->note_admin])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status])
            ->andFilterWhere(['like', 'device', $this->device])
            ->andFilterWhere(['like', 'channel', $this->channel]);

        return $dataProvider;
    }
}