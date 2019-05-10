<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Price List.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $name
 * @property tinyint $is_default
 * @property integer $effective_at
 * @property integer $expries_at
 * @property tinyint $status
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class PriceList extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_item_price_list}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-pricelist';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'is_default' => Yii::t('app', 'Is Default'),
            'effective_at' => Yii::t('app', 'Effective At'),
            'expries_at' => Yii::t('app', 'Expries At'),
            'status' => Yii::t('app', 'Status')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['is_default', 'status'], 'integer'],
            [['effective_at', 'expries_at'], 'default', 'value' => ''],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'name' => 'text',
            'is_default' => 'toggleStatus',
            'effective_at' => 'datetime',
            'expries_at' => 'datetime',
            'status' => 'toggleStatus',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['name', 'is_default', 'effective_at', 'expries_at', 'status']],
            [['create', 'update'], ['name', 'is_default', 'effective_at', 'expries_at', 'status']],
            ['delete', false],
        ];
    }

}
