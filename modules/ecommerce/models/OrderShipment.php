<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "{{%ecommerce_order_shipment}}".
 *
 * @property int $oid
 * @property string $fullname
 * @property string $phone
 * @property string $address
 */
class OrderShipment extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ec_order_shipment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oid'], 'required'],
            [['oid'], 'integer'],
            [['fullname', 'phone', 'address'], 'string', 'max' => 255],
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
            'fullname' => Yii::t('app', 'Fullname'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
        ];
    }
}
