<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "estore_article_attribute_value".
 *
 * @property integer $article_id
 * @property integer $set_id
 * @property integer $attribute_id
 * @property string $value
 */
class ItemAttributeValue extends \hp\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ec_item_attribute_value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'set_id', 'attribute_id'], 'required'],
            [['item_id', 'set_id', 'attribute_id'], 'integer'],
            [['value'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'attribute_id' => 'Attribute ID',
            'set_id' => 'Set ID',
            'value' => 'Value',
        ];
    }
}
