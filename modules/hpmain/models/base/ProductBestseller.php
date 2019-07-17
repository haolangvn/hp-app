<?php

namespace hpmain\models\base;

use Yii;

/**
 * This is the model class for table "ec_product_bestseller".
 *
 * @property int $id
 * @property int $product_id
 * @property int $month
 * @property int $sell_count
 *
 * @property EcProduct $product
 */
class ProductBestseller extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ec_product_bestseller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'month', 'sell_count'], 'required'],
            [['product_id', 'month', 'sell_count'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => EcProduct::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'month' => Yii::t('app', 'Month'),
            'sell_count' => Yii::t('app', 'Sell Count'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(EcProduct::className(), ['id' => 'product_id']);
    }
}
