<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "{{%ecommerce_order_detail}}".
 *
 * @property int $id
 * @property int $oid
 * @property int $pid product Id
 * @property int $specid Price Id
 * @property int $price Đơn giá
 * @property int $quantity
 * @property int $total Tổng Line (chưa giảm giá)
 * @property int $discount Giảm giá theo line
 * @property double $discount_per Giảm % theo line
 * @property int $cost Tổng Line(đã giảm giá)
 * @property string $product
 * @property string $note
 * @property string $promotion_code Ex: Mai190093,Mai190092
 * @property string $promotion_type 0: Không KM, 20: Discount by Line, 31: Free item
 * @property string $description
 */
class OrderDetail extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ec_order_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oid', 'pid', 'specid', 'price', 'quantity', 'total', 'discount', 'cost', 'promotion_type'], 'integer'],
            [['discount_per'], 'number'],
            [['product'], 'required'],
            [['product', 'description'], 'string'],
            [['note'], 'string', 'max' => 255],
            [['promotion_code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'oid' => Yii::t('app', 'Oid'),
            'pid' => Yii::t('app', 'Pid'),
            'specid' => Yii::t('app', 'Specid'),
            'price' => Yii::t('app', 'Price'),
            'quantity' => Yii::t('app', 'Quantity'),
            'total' => Yii::t('app', 'Total'),
            'discount' => Yii::t('app', 'Discount'),
            'discount_per' => Yii::t('app', 'Discount Per'),
            'cost' => Yii::t('app', 'Cost'),
            'product' => Yii::t('app', 'Product'),
            'note' => Yii::t('app', 'Note'),
            'promotion_code' => Yii::t('app', 'Promotion Code'),
            'promotion_type' => Yii::t('app', 'Promotion Type'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
