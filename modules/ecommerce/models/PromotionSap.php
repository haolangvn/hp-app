<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "{{%ec_promotion_sap}}".
 *
 * @property int $id
 * @property string $code
 * @property string $sap_name
 * @property string $sap_fromdate
 * @property string $sap_todate
 * @property string $sap_status
 * @property string $name
 * @property string $description
 * @property int $priority
 * @property int $from_date
 * @property int $to_date
 * @property int $so_header
 * @property int $so_lines
 * @property int $type
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PromotionSap extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ec_promotion_sap}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'sap_name'], 'required'],
            [['description'], 'string'],
            [['priority', 'from_date', 'to_date', 'so_header', 'so_lines', 'type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['code'], 'string', 'max' => 100],
            [['sap_name', 'name'], 'string', 'max' => 255],
            [['sap_fromdate', 'sap_todate'], 'string', 'max' => 20],
            [['sap_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'sap_name' => Yii::t('app', 'Sap Name'),
            'sap_fromdate' => Yii::t('app', 'Sap Fromdate'),
            'sap_todate' => Yii::t('app', 'Sap Todate'),
            'sap_status' => Yii::t('app', 'Sap Status'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'priority' => Yii::t('app', 'Priority'),
            'from_date' => Yii::t('app', 'From Date'),
            'to_date' => Yii::t('app', 'To Date'),
            'so_header' => Yii::t('app', 'So Header'),
            'so_lines' => Yii::t('app', 'So Lines'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
