<?php

namespace app\modules\ecommerce\models;

/**
 * This is the model class for table "estore_set_attsribute_ref".
 *
 * @property integer $set_id
 * @property integer $attribute_id
 */
class SetAttributeRef extends \hp\base\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_set_attribute_ref}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['set_id', 'attribute_id'], 'required'],
            [['set_id', 'attribute_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'set_id' => 'Set ID',
            'attribute_id' => 'Attribute ID',
        ];
    }

}
