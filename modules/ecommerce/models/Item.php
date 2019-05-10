<?php

namespace app\modules\ecommerce\models;

use Yii;
use app\modules\ecommerce\admin\plugins\ItemAttributesPlugin;
use app\modules\ecommerce\models\ItemAttributeValue;

/**
 * Item.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $sap_id
 * @property integer $product_id
 * @property integer $producer_id
 * @property integer $gender_id
 * @property integer $cate_id
 * @property integer $group_id
 * @property integer $group2_id
 * @property integer $group3_id
 * @property integer $color_id
 * @property integer $collection_id
 * @property integer $capa_id
 * @property string $capacity
 * @property string $name
 * @property string $fk_name
 * @property string $colour
 * @property string $image
 * @property text $image_list
 * @property string $note
 * @property string $sku
 * @property integer $qty_available
 * @property tinyint $status
 * @property tinyint $synced_at
 * @property tinyint $published_at
 */
class Item extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_product_item}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'sap_id' => Yii::t('app', 'Sap ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'producer_id' => Yii::t('app', 'Producer ID'),
            'gender_id' => Yii::t('app', 'Gender ID'),
            'cate_id' => Yii::t('app', 'Cate ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'group2_id' => Yii::t('app', 'Group2 ID'),
            'group3_id' => Yii::t('app', 'Group3 ID'),
            'color_id' => Yii::t('app', 'Color ID'),
            'collection_id' => Yii::t('app', 'Collection ID'),
            'capa_id' => Yii::t('app', 'Capa ID'),
            'capacity' => Yii::t('app', 'Capacity'),
            'name' => Yii::t('app', 'Name'),
            'fk_name' => Yii::t('app', 'Foreign Name'),
            'colour' => Yii::t('app', 'Colour'),
            'image' => Yii::t('app', 'Image'),
            'image_list' => Yii::t('app', 'Image List'),
            'note' => Yii::t('app', 'Note'),
            'sku' => Yii::t('app', 'Sku'),
            'qty_available' => Yii::t('app', 'Qty Available'),
            'status' => Yii::t('app', 'Status'),
            'synced_at' => Yii::t('app', 'Synced At'),
            'published_at' => Yii::t('app', 'Published At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sap_id', 'capacity', 'name', 'fk_name'], 'required'],
            [['product_id', 'producer_id', 'gender_id', 'cate_id', 'group_id', 'group2_id', 'group3_id', 'color_id', 'collection_id', 'capa_id', 'qty_available', 'status', 'synced_at', 'published_at', 'image_id'], 'integer'],
            [['image_list'], 'string'],
            [['sap_id'], 'string', 'max' => 25],
            [['capacity', 'name', 'fk_name', 'colour', 'image', 'note', 'sku'], 'string', 'max' => 255],
            [['sap_id'], 'unique'],
            [['values'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'sap_id' => 'text',
            'product_id' => 'number',
//            'product_id' => [
//                'selectModel',
//                'modelClass' => Product::class,
//                'labelField' => ['name']
//            ],
//            'producer_id' => 'number',
//            'gender_id' => 'number',
//            'cate_id' => 'number',
//            'group_id' => 'number',
//            'group2_id' => 'number',
//            'group3_id' => 'number',
//            'color_id' => 'number',
//            'collection_id' => 'number',
//            'capa_id' => 'number',
            'capacity' => 'text',
            'name' => 'text',
            'fk_name' => 'text',
            'colour' => 'text',
            'image' => 'text',
            'image_id' => 'image',
            'image_list' => 'imageArray',
            'note' => 'text',
            'sku' => 'text',
            'qty_available' => 'number',
            'status' => 'number',
//            'synced_at' => 'number',
//            'published_at' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['product_id', 'name', 'sku', 'status']],
            [['create', 'update'], ['sap_id', 'product_id', 'capacity', 'name', 'fk_name', 'image_id', 'image_list', 'colour', 'image', 'note', 'sku', 'qty_available', 'status', 'values']],
            ['delete', false],
        ];
    }

    public function extraFields() {
        return ['values'];
    }

    public function ngRestExtraAttributeTypes() {
        return [
            'values' => [
                'class' => ItemAttributesPlugin::class,
            ]
        ];
    }

    public function getValues() {
        $data = [];
        foreach ($this->attributeValues as $value) {
            $data[$value->set_id][$value->attribute_id] = $value->value;
        }

        return $data;
    }

    public function getAttributeValues() {
        return $this->hasMany(ItemAttributeValue::class, ['item_id' => 'id']);
    }

    public function setValues($data) {
        if ($this->isNewRecord) {
            $this->on(self::EVENT_AFTER_INSERT, function () use ($data) {
                $this->updateSetValues($data);
            });
        } else {
            $this->updateSetValues($data);
        }
    }

    private function updateSetValues($data) {
        $this->unlinkAll('itemValues', true);
        foreach ($data as $setId => $values) {
            foreach ($values as $attributeId => $attributeValue) {
                $model = new ItemAttributeValue();
                $model->attribute_id = $attributeId;
                $model->value = $attributeValue;
                $model->set_id = $setId;
                $this->link('itemValues', $model);
            }
        }
    }

    public function getItemValues() {
        return $this->hasMany(ItemAttributeValue::class, ['item_id' => 'id']);
    }

    public function getProduct() {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getProducer() {
        return $this->hasOne(Producer::class, ['id' => 'producer_id']);
    }

    public function getPrices() {
        return $this->hasMany(Price::class, ['item_id' => 'id']);
    }

    public function getBarcodes() {
        return $this->hasMany(Barcode::class, ['item_id' => 'id']);
    }

    /**
     * Search in column
     * @return type
     */
    public function genericSearchFields() {
        return [
            'id', 'sku', 'name', 'product_id'
        ];
    }

    /**
     * Group by category
     * @return string
     */
    public function ngRestGroupByField() {
        return 'product_id';
    }

    /**
     * Filter
     * @return type
     */
    public function ngRestFilters() {
        return [
            'Active' => self::find()->where(['status' => 1]),
            'Inactive' => self::find()->where(['status' => 0]),
        ];
    }

    public function ngRestListOrder() {
        return ['id' => SORT_DESC];
    }

    public function ngRestRelations() {
        return [
            ['label' => 'Prices', 'apiEndpoint' => Price::ngRestApiEndpoint(), 'dataProvider' => $this->getPrices()],
            ['label' => 'Barcode', 'apiEndpoint' => Barcode::ngRestApiEndpoint(), 'dataProvider' => $this->getBarcodes()],
            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }

}
