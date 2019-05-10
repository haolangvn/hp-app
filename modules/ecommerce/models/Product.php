<?php

namespace app\modules\ecommerce\models;

use Yii;
use luya\admin\ngrest\plugins\CheckboxRelationActiveQuery;

/**
 * Product.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 *
 * @property \app\modules\ecommerce\models\Set $sets
 * @property integer $id
 * @property text $name
 * @property integer $producer_id
 */
class Product extends \hp\ngrest\NgRestModel {
    /**
     * @inheritdoc
     */
//    public $i18n = ['name'];

    /**
     * @var array
     */
    public $adminGroups = [];

    /**
     * @var array
     */
    public $adminSets = [];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_product}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-product';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'notes_id' => Yii::t('app', 'Notes ID'),
            'image_id' => Yii::t('app', 'Image ID'),
            'name' => Yii::t('app', 'Name'),
            'fk_name' => Yii::t('app', 'Foreign Name'),
            'alias' => Yii::t('app', 'Alias'),
            'promote' => Yii::t('app', 'Promote'),
            'is_new' => Yii::t('app', 'Is New'),
            'status' => Yii::t('app', 'Status'),
            'count_view' => Yii::t('app', 'Count View'),
            'cout_sell' => Yii::t('app', 'Cout Sell'),
            'image' => Yii::t('app', 'Image'),
            'image_list' => Yii::t('app', 'Image List'),
            'orginal' => Yii::t('app', 'Orginal'),
            'pub_year' => Yii::t('app', 'Pub Year'),
            'remark' => Yii::t('app', 'Remark'),
            'adminGroups' => 'Categories',
            'adminSets' => 'Attribute Sets',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['notes_id', 'promote', 'is_new', 'status', 'image_id'], 'integer'],
            [['name', 'fk_name'], 'required'],
            [['image_list'], 'string'],
            [['name', 'fk_name', 'alias', 'remark'], 'string', 'max' => 255],
            [['orginal', 'pub_year'], 'string', 'max' => 25],
            [['adminGroups', 'adminSets', 'image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'notes_id' => 'number',
            'image_id' => 'image',
            'name' => 'text',
            'fk_name' => 'text',
            'alias' => ['slug', 'listener' => 'name'],
            'promote' => 'toggleStatus',
            'is_new' => 'toggleStatus',
            'status' => 'toggleStatus',
            'count_view' => 'number',
            'cout_sell' => 'number',
            'image' => 'text',
            'image_id' => 'image',
            'image_list' => 'imageArray',
            'orginal' => 'text',
            'pub_year' => 'text',
            'remark' => 'text',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['name', 'promote', 'is_new', 'status']],
            [['create', 'update'], ['notes_id', 'name', 'fk_name', 'alias', 'promote', 'is_new', 'status', 'image', 'image_id', 'image_list', 'orginal', 'pub_year', 'adminGroups', 'adminSets']],
            ['delete', true],
        ];
    }

    public function ngRestExtraAttributeTypes() {
        return [
            'adminGroups' => [
                'class' => CheckboxRelationActiveQuery::class,
                'query' => $this->getGroups(),
                'labelField' => function($item) {
                    return $item['name'] . ' - ' . $item['id'];
                },
            ],
            'adminSets' => [
                'class' => CheckboxRelationActiveQuery::class,
                'query' => $this->getSets(),
                'labelField' => ['name'],
            ]
        ];
    }

    public function extraFields() {
        return ['adminGroups', 'adminSets'];
    }

    public function getArticles() {
        return $this->hasMany(Article::class, ['product_id' => 'id']);
    }

    public function getGroups() {
        return $this->hasMany(Group::class, ['id' => 'group_id'])->viaTable(ProductGroupRef::tableName(), ['product_id' => 'id']);
    }

    public function getSets() {
        return $this->hasMany(Set::class, ['id' => 'set_id'])->viaTable(ProductSetRef::tableName(), ['product_id' => 'id']);
    }

    /**
     * Search in column
     * @return type
     */
    public function genericSearchFields() {
        return [
            'id', 'name', 'fk_name'
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
            ['label' => 'Items', 'apiEndpoint' => Item::ngRestApiEndpoint(), 'dataProvider' => $this->getItem()],
            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }

    public function getItem() {
        return $this->hasMany(Item::class, ['product_id' => 'id']);
    }

}
