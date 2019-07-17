<?php

namespace hpmain\models;

use Yii;
use hp\base\NgRestModel;

/**
 * Store.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $image
 * @property string $coordinates
 * @property string $province
 * @property string $region
 * @property string $system
 * @property text $content
 * @property integer $sort_order
 * @property tinyint $is_hidden
 * @property tinyint $is_deleted
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Store extends NgRestModel {

    use \luya\admin\traits\SoftDeleteTrait,
        \hp\traits\SortOrderTrait;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'hp_store';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-main-store';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'image' => Yii::t('app', 'Image'),
            'coordinates' => Yii::t('app', 'Coordinates'),
            'province' => Yii::t('app', 'Province'),
            'region' => Yii::t('app', 'Region'),
            'system' => Yii::t('app', 'System'),
            'content' => Yii::t('app', 'Content'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_hidden' => Yii::t('app', 'Is Hidden'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'province', 'system'], 'required'],
            [['content'], 'string'],
            [['sort_order', 'is_hidden', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'alias', 'address', 'image', 'coordinates'], 'string', 'max' => 255],
            [['phone', 'email', 'province'], 'string', 'max' => 50],
            [['region'], 'string', 'max' => 25],
            [['system'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
//    public function ngRestAttributeTypes() {
//        return [
//            'name' => 'text',
//            'alias' => 'text',
//            'phone' => 'text',
//            'address' => 'text',
//            'email' => 'text',
//            'image' => 'text',
//            'coordinates' => 'text',
//            'province' => 'text',
//            'region' => 'text',
//            'system' => 'text',
//            'content' => 'textarea',
//            'sort_order' => 'number',
//            'is_hidden' => 'number',
//            'is_deleted' => 'number',
//            'created_at' => 'number',
//            'updated_at' => 'number',
//            'created_by' => 'number',
//            'updated_by' => 'number',
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function ngRestScopes() {
//        return [
//            ['list', ['name', 'alias', 'phone', 'address', 'email', 'image', 'coordinates', 'province', 'region', 'system', 'content', 'sort_order', 'is_hidden', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by']],
//            [['create', 'update'], ['name', 'alias', 'phone', 'address', 'email', 'image', 'coordinates', 'province', 'region', 'system', 'content', 'sort_order', 'is_hidden', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by']],
//            ['delete', false],
//        ];
//    }

}
