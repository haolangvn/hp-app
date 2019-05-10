<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Term.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $vid
 * @property string $sap_id
 * @property string $alias
 * @property string $name
 * @property text $description
 * @property integer $weight
 * @property tinyint $status
 */
class Term extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_group_term}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-term';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'vid' => Yii::t('app', 'Vid'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'sap_id' => Yii::t('app', 'Sap ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'weight' => Yii::t('app', 'Weight'),
            'image_id' => Yii::t('app', 'Image ID'),
            'images_list' => Yii::t('app', 'Images List'),
            'synced_at' => Yii::t('app', 'Synced At'),
            'published_at' => Yii::t('app', 'Published At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['vid', 'weight', 'status', 'image_id'], 'integer'],
            [['sap_id', 'alias', 'name'], 'required'],
            [['description', 'images_list'], 'string'],
            [['sap_id'], 'string', 'max' => 25],
            [['alias', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'vid' => [
                'selectModel',
                'modelClass' => Vocabulary::class,
                'labelField' => 'name'
            ],
            'sap_id' => 'text',
            'alias' => 'text',
            'name' => 'text',
            'description' => 'textarea',
            'image_id' => 'image',
            'images_list' => 'imageArray',
            'status' => 'toggleStatus',
            'weight' => 'text',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['vid', 'sap_id', 'name', 'weight', 'status']],
            [['create', 'update'], ['vid', 'sap_id', 'alias', 'name', 'description', 'weight', 'status', 'image_id']],
            ['delete', true],
        ];
    }

    /**
     * Search in column
     * @return type
     */
    public function genericSearchFields() {
        return [
            'vid', 'id', 'sap_id', 'name'
        ];
    }

    /**
     * Group by category
     * @return string
     */
    public function ngRestGroupByField() {
        return 'vid';
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

    public function getVoc() {
        return $this->hasOne(Vocabulary::class, ['id' => 'vid']);
    }

}
