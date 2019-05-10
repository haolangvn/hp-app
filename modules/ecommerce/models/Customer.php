<?php

namespace app\modules\ecommerce\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Customer.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $fullname
 * @property string $phone
 * @property string $address
 */
class Customer extends \hp\ngrest\NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecommerce_customer';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-ecommerce-customer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Fullname'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'phone'], 'required'],
            [['fullname', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'fullname' => 'text',
            'phone' => 'text',
            'address' => 'text',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['fullname', 'phone', 'address']],
            [['create', 'update'], ['fullname', 'phone', 'address']],
            ['delete', false],
        ];
    }
}