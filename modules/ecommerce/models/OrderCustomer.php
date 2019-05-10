<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "{{%ecommerce_order_customer}}".
 *
 * @property int $oid
 * @property string $fullname
 * @property int $gender 2: Mrs, 1: Mr
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property int $district_id
 * @property int $province_id
 * @property string $region
 * @property int $confirmed Xác nhận khách hàng, sau đó tạo tài khoản cho khác
 */
class OrderCustomer extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ec_order_customer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oid', 'fullname', 'phone'], 'required'],
            [['oid', 'gender', 'district_id', 'province_id', 'confirmed'], 'integer'],
            [['fullname', 'phone', 'email'], 'string', 'max' => 255],
            [['address'], 'string'],
            [['region'], 'string', 'max' => 100],
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
            'gender' => Yii::t('app', 'Gender'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'district_id' => Yii::t('app', 'District ID'),
            'province_id' => Yii::t('app', 'Province ID'),
            'region' => Yii::t('app', 'Region'),
            'confirmed' => Yii::t('app', 'Confirmed'),
        ];
    }
}
