<?php

namespace app\modules\ecommerce\models;

use app\modules\ecommerce\models\Group;
use app\modules\ecommerce\models\Product;

/**
 * This is the model class for table "estore_product_group_ref".
 *
 * @property integer $group_id
 * @property integer $product_id
 */
class ProductGroupRef extends \hp\base\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_product_group_ref}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['group_id', 'product_id'], 'required'],
            [['group_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'group_id' => 'Group ID',
            'product_id' => 'Product ID',
        ];
    }

    public function getGroups() {
        return $this->hasMany(Group::class, ['id' => 'group_id']);
    }

    public function getProducts() {
        return $this->hasmany(Product::class, ['id' => 'product_id']);
    }

}
