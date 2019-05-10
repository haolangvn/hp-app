<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Group.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $image_id
 * @property string $image_list
 * @property string $description
 */
class Group extends \hp\ngrest\NgRestModel {
    /**
     * @inheritdoc
     */
//    public $i18n = ['images_list', 'name', 'description'];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_group}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'weight' => Yii::t('app', 'Weight'),
            'image_id' => Yii::t('app', 'Cover Image ID'),
            'image_list' => Yii::t('app', 'Images List'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'image_id', 'weight', 'status'], 'integer'],
            [['name'], 'required'],
            [['image_list', 'description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['parent_id', 'weight'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'parent_id' => [
                'class' => 'hp\admin\plugins\TreeListPlugin',
                'modelClass' => self::class,
            ],
            'name' => 'text',
            'image_id' => 'image',
            'image_list' => 'imageArray',
            'status' => 'toggleStatus',
            'weight' => 'text',
            'description' => 'textarea',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['name', 'image_id', 'weight', 'status']],
            [['create', 'update'], ['parent_id', 'name', 'weight', 'status', 'image_id', 'image_list', 'description']],
            ['delete', false],
        ];
    }

    public function getParent() {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    public function getChilds() {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }

    /**
     * Search in column
     * @return type
     */
    public function genericSearchFields() {
        return [
            'id', 'name'
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
        ];
    }
    
    public function ngRestRelations() {
        return [
            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }

}
