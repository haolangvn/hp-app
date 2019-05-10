<?php

namespace app\modules\ecommerce\models;

use Yii;
use luya\admin\ngrest\plugins\SelectRelationActiveQuery;

/**
 * Price.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $currency_id
 * @property integer $article_id
 * @property integer $price_list_id
 * @property float $price
 * @property integer $stock
 */
class Price extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_item_price}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-price';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'currency_id' => Yii::t('app', 'Currency ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'price_list_id' => Yii::t('app', 'Price List ID'),
            'price' => Yii::t('app', 'Price'),
            'stock' => Yii::t('app', 'Stock')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['currency_id', 'item_id', 'price_list_id', 'price', 'stock'], 'required'],
            [['currency_id', 'item_id', 'price_list_id', 'stock'], 'integer'],
            [['price'], 'number'],
            [['item_id', 'currency_id', 'price_list_id'], 'unique', 'targetAttribute' => ['item_id', 'currency_id', 'price_list_id']],
            [['currency_id', 'price_list_id'], 'default', 'value' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'item_id' => [
                'class' => SelectRelationActiveQuery::class,
                'query' => $this->getItem()->select(['id', 'name']),
                'labelField' => ['name'],
                'asyncList' => true
            ],
            'currency_id' => [
                'selectModel',
                'modelClass' => Currency::class,
//                'class' => SelectRelationActiveQuery::class,
//                'query' => $this->getCurrency()->select(['id', 'name']),
//                'valueField' => 'id',
                'labelField' => 'name'
            ],
            'price_list_id' => [
                'selectModel',
                'modelClass' => PriceList::class,
//                'valueField' => 'id',
                'labelField' => 'name',
            ],
            'price' => 'decimal',
            'stock' => 'number'
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['itemName', 'price', 'stock']],
            [['create', 'update'], ['item_id', 'currency_id', 'price_list_id', 'price', 'stock']],
            ['delete', true],
        ];
    }

    /**
     * 
     * @return Article
     */
    public function getItem() {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    /**
     * @return Currency
     */
    public function getCurrency() {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }

    /**
     * 
     * @return PriceList
     */
    public function getPriceList() {
        return $this->hasOne(PriceList::class, ['id' => 'price_list_id']);
    }
    

    public function getItemName() {
        return $this->item->name;
    }

    public function extraFields() {
        return ['itemName'];
    }

    public function ngRestExtraAttributeTypes() {
        return [
            'itemName' => 'text',
        ];
    }

    public function ngRestRelations() {
        return [
            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }
}
