<?php

namespace app\modules\ecommerce\models;

/**
 * This is the model class for table "estore_product_set_ref".
 *
 * @property integer $product_id
 * @property integer $set_id
 */
class ProductSetRef extends \hp\base\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_product_set_ref}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['product_id', 'set_id'], 'required'],
            [['product_id', 'set_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'product_id' => 'Product ID',
            'set_id' => 'Set ID',
        ];
    }

}
