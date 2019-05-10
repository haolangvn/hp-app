<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "{{%ecommerce_order_vat}}".
 *
 * @property int $oid
 * @property string $name
 * @property string $address
 * @property string $tax_code
 */
class OrderVat extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ec_order_vat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['oid', 'name', 'address', 'tax_code'], 'required'],
            [['oid'], 'required'],
            [['oid'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['tax_code'], 'string', 'max' => 15],
            [['oid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'oid' => Yii::t('app', 'Oid'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'tax_code' => Yii::t('app', 'Tax Code'),
        ];
    }
}
