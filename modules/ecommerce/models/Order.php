<?php

namespace app\modules\ecommerce\models;

use Yii;
use hp\utils\UShort;

/**
 * This is the model class for table "{{%ecommerce_order}}".
 *
 * @property int $id
 * @property string $billing
 * @property int $ocustomer_id
 * @property int $oshipment_id
 * @property int $shipping_cost
 * @property int $total Tổng giá trị đã trừ KM theo line
 * @property int $cost Giá trị thanh toán bill (chua bao gồm phí giao hàng)
 * @property int $discount KM theo Bill
 * @property double $discount_per
 * @property string $note Remarks trên POS
 * @property string $note_admin
 * @property string $payment
 * @property string $payment_status
 * @property string $device
 * @property string $channel
 * @property int $isSync
 * @property string $promotion_code Ex: Mai190093,Mai190092
 * @property string $promotion_type 0: Không KM, 20: Discount by Line, 31: Free item
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Order extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%ec_order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['ocustomer_id', 'oshipment_id', 'shipping_cost', 'total', 'cost', 'discount', 'isSync', 'promotion_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['discount_per'], 'number'],
            [['billing'], 'string', 'max' => 25],
            [['note', 'note_admin', 'payment', 'payment_status', 'device', 'channel'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['promotion_code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'billing' => Yii::t('app', 'Billing'),
            'ocustomer_id' => Yii::t('app', 'Ocustomer ID'),
            'oshipment_id' => Yii::t('app', 'Oshipment ID'),
            'shipping_cost' => Yii::t('app', 'Shipping Cost'),
            'total' => Yii::t('app', 'Total'),
            'cost' => Yii::t('app', 'Cost'),
            'discount' => Yii::t('app', 'Discount'),
            'discount_per' => Yii::t('app', 'Discount Per'),
            'note' => Yii::t('app', 'Note'),
            'note_admin' => Yii::t('app', 'Note Admin'),
            'payment' => Yii::t('app', 'Payment'),
            'payment_status' => Yii::t('app', 'Payment Status'),
            'device' => Yii::t('app', 'Device'),
            'channel' => Yii::t('app', 'Channel'),
            'isSync' => Yii::t('app', 'Is Sync'),
            'promotion_code' => Yii::t('app', 'Promotion Code'),
            'promotion_type' => Yii::t('app', 'Promotion Type'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getCustomer() {
        return $this->hasOne(OrderCustomer::className(), ['oid' => 'id']);
    }

    public function getShipment() {
        return $this->hasOne(OrderShipment::className(), ['oid' => 'id']);
    }

    public function getVat() {
        return $this->hasOne(OrderVat::className(), ['oid' => 'id']);
    }

    public function getDetails() {
        return $this->hasMany(OrderDetail::className(), ['oid' => 'id'])->all();
    }

    public function updateTotal() {
        $sql = "update ec_order "
                . "set total = coalesce((select sum(cost) from ec_order_detail where oid={$this->id}), 0) "
                . "where id = {$this->id}";
        UShort::app()->db->createCommand($sql)->execute();
        return true;
    }

    public function updateCost() {
        $discount_per = round((($this->discount / $this->total) * 100), 4);
        $sql = "update ec_order "
                . "set cost =   (total - {$this->discount}), discount_per = '{$discount_per}' "
                . "where id = {$this->id}";
        UShort::app()->db->createCommand($sql)->execute();
        return true;
    }

}
