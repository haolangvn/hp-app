<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Producer.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 *
 * @property int $id
 * @property string $sap_id
 * @property string $name
 * @property string $alias
 * @property string $slogan
 * @property string $country
 * @property string $logo
 * @property int $status
 * @property int $weight
 * @property int $image_id
 */
class Producer extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_producer}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-producer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'sap_id' => Yii::t('app', 'Sap ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'slogan' => Yii::t('app', 'Slogan'),
            'country' => Yii::t('app', 'Country'),
            'logo' => Yii::t('app', 'Logo'),
            'status' => Yii::t('app', 'Status'),
            'weight' => Yii::t('app', 'Weight'),
            'image_id' => Yii::t('app', 'Logo Image'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['status', 'weight', 'image_id'], 'integer'],
            [['name', 'alias', 'sap_id', 'slogan', 'country'], 'string', 'max' => 255],
            [['slogan', 'country', 'logo'], 'default', 'value' => NULL]
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'name' => 'text',
            'alias' => ['slug', 'listener' => 'name'],
            'sap_id' => 'text',
            'slogan' => 'text',
            'country' => 'text',
            'logo' => 'text',
            'image_id' => 'image',
            'status' => 'toggleStatus',
            'weight' => 'number',
            'image_list' => 'imageArray'
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['name', 'image_id', 'status', 'weight']],
            [['create', 'update'], ['name', 'alias', 'sap_id', 'slogan', 'country', 'weight', 'status', 'image_id']],
            ['delete', true],
        ];
    }


    /**
     * Search in column
     * @return type
     */
    public function genericSearchFields() {
        return [
            'id', 'sap_id', 'name'
        ];
    }

    /**
     * Filter
     * @return type
     */
    public function ngRestFilters() {
        return [
            'Active' => self::find()->where(['status' => 1]),
            'Inactive' => self::find()->where(['status' => 0]),
            'Not Publish' => self::find()->where(['published_at' => 0]),
        ];
    }

    public function ngRestRelations() {
        return [
            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }

}
