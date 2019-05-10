<?php

namespace app\modules\ecommerce\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Test.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $item_id
 * @property string $barcode
 * @property tinyint $is_default
 * @property string $remark
 */
class Test extends \hp\ngrest\NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec_item_barcode';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-ecommerce-test';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => Yii::t('app', 'Item ID'),
            'barcode' => Yii::t('app', 'Barcode'),
            'is_default' => Yii::t('app', 'Is Default'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'barcode'], 'required'],
            [['item_id', 'is_default'], 'integer'],
            [['barcode'], 'string', 'max' => 25],
            [['remark'], 'string', 'max' => 255],
            [['item_id', 'barcode'], 'unique', 'targetAttribute' => ['item_id', 'barcode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'is_default' => 'number',
            'remark' => 'text',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['is_default', 'remark']],
            [['create', 'update'], ['is_default', 'remark']],
            ['delete', false],
        ];
    }
}