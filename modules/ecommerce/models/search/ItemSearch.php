<?php

namespace app\modules\ecommerce\models\search;

use yii\data\ActiveDataProvider;
use yii\base\Model;
use app\modules\ecommerce\models\Producer;
use app\modules\ecommerce\models\Product;
use app\modules\ecommerce\models\Item;
use app\modules\ecommerce\models\Price;
use app\modules\ecommerce\frontend\componets\ProductList;

/**
 * Description of ItemSearch
 *
 * @author HAO
 */
class ItemSearch extends \yii\db\ActiveRecord {

    public $notes_id;

    public static function tableName() {
        return '{{%ec_product_item}}';
    }

    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function rules() {
        return [
            [['product_id', 'producer_id', 'gender_id', 'cate_id', 'group_id', 'group2_id', 'group3_id', 'color_id', 'collection_id', 'capa_id', 'notes_id'], 'integer'],
            [['name', 'fk_name', 'colour', 'sku', 'sap_id'], 'string', 'max' => 255],
        ];
    }

    public static function query($params = []) {

        $item = new ItemSearch();
        $item->attributes = $params;
//        $item->validate();

        $query = new \yii\db\Query();
        $query->from(Item::tableName() . ' item');
        $query->select('pro.id, pro.name pname, pro.fk_name pfk_name, pro.alias palias, pro.image pimage, pro.image_id pimage_id, brand.name bname, brand.alias balias, max(price.price) price, 0 as [[discount]] ');
        $query->groupBy('pro.id, brand.id');
        $query->innerJoin(Product::tableName() . ' pro', 'pro.id=item.product_id');
        $query->innerJoin(Producer::tableName() . ' brand', 'brand.id=item.producer_id');
        $query->leftJoin(Price::tableName() . ' price', 'price.item_id=item.id');
        $query->where([
            'pro.status' => 1,
            'brand.status' => 1,
            'price.price_list_id' => 1, // bản giá le mặc định            
        ]);
        $query->andWhere(['>', 'price.price', 1000]);
        $query->andFilterWhere([
            'item.capa_id' => $item->capa_id,
            'item.cate_id' => $item->cate_id,
            'item.collection_id' => $item->collection_id,
            'item.color_id' => $item->color_id,
            'item.gender_id' => $item->gender_id,
            'item.group_id' => $item->group_id,
            'item.group2_id' => $item->group2_id,
            'item.group3_id' => $item->group3_id,
            'pro.notes_id' => $item->notes_id,
        ]);

        return $query;
    }

    /**
     * Get DataProvider with query params
     * @param type $params
     * @return \app\modules\ecommerce\frontend\componets\ProductItem
     */
    public static function search($params = [], $size = 4) {
        $provider = new ActiveDataProvider([
            'query' => self::query($params),
            'pagination' => [
                'pageSize' => $size
            ],
            'sort' => [
                'defaultOrder' => [
                    'pro.promote' => SORT_DESC,
                    'pro.updated_at' => SORT_DESC
                ],
                'attributes' => [
                    'pro.id',
                    'price.cate_id',
                    'pro.pub_year',
                    'pro.notes_id',
                    'pro.promote',
                    'pro.count_sell',
                    'pro.count_view',
                    'pro.updated_at',
                    'price.price',
//                    'seller.count'
                ],
            ]
        ]);

        $product = new ProductList();

        $product->items = $provider->getModels();
        $product->page = $provider->getPagination();

        return $product;
    }

}
