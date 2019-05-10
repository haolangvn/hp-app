<?php

namespace app\modules\demo\models;

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
class Test extends NgRestModel
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
        return 'api-demo-test';
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
            'item_id' => 'number',
            'barcode' => 'text',
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
            [['create', 'update'], ['item_id', 'barcode', 'is_default', 'remark']],
            ['delete', true],
        ];
    }
}