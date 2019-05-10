<?php

namespace app\modules\ecommerce\models;

use Yii;
use hp\admin\plugins\Wysiwyg;

/**
 * Product Article.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property text $image_list
 * @property string $image
 * @property string $designer
 * @property string $remark
 * @property text $notes
 * @property text $style
 * @property text $review
 * @property text $ingredient
 * @property text $benefit
 * @property text $howtouse
 * @property text $description
 * @property string $meta_link
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class ProductArticle extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_product_article}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-productarticle';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'Product ID'),
            'image_id' => Yii::t('app', 'Image ID'),
            'image_list' => Yii::t('app', 'Image List'),
            'image' => Yii::t('app', 'Image'),
            'designer' => Yii::t('app', 'Designer'),
            'remark' => Yii::t('app', 'Remark'),
            'notes' => Yii::t('app', 'Notes'),
            'style' => Yii::t('app', 'Style'),
            'review' => Yii::t('app', 'Review'),
            'ingredient' => Yii::t('app', 'Ingredient'),
            'benefit' => Yii::t('app', 'Benefit'),
            'howtouse' => Yii::t('app', 'Howtouse'),
            'description' => Yii::t('app', 'Description'),
            'meta_link' => Yii::t('app', 'Meta Link'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_desc' => Yii::t('app', 'Meta Desc'),
            'meta_keyword' => Yii::t('app', 'Meta Keyword'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'required'],
            [['id', 'image_id'], 'integer'],
            [['image_list', 'notes', 'style', 'review', 'ingredient', 'benefit', 'howtouse', 'description'], 'string'],
            [['image', 'remark', 'meta_link', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['designer'], 'string', 'max' => 25],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'image_list' => 'imageArray',
            'image_id' => 'image',
            'image' => 'text',
            'designer' => 'text',
            'remark' => 'text',
            'notes' => 'textarea',
            'style' => 'textarea',
            'review' => 'textarea',
            'ingredient' => [
                'class' => Wysiwyg::class,
            ],
            'benefit' => [
                'class' => Wysiwyg::class,
            ],
            'howtouse' => [
                'class' => Wysiwyg::class,
            ],
            'description' => [
                'class' => Wysiwyg::class,
            ],
            'meta_link' => 'text',
            'meta_title' => 'text',
            'meta_desc' => 'textarea',
            'meta_keyword' => 'textarea',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['productName', 'image_id', 'designer', 'remark']],
            [['create', 'update'], ['image', 'image_id', 'image_list', 'designer', 'remark', 'notes', 'style', 'review', 'ingredient', 'benefit', 'howtouse', 'description', 'meta_link', 'meta_title', 'meta_desc', 'meta_keyword']],
            ['delete', true],
        ];
    }

    public function ngRestAttributeGroups() {
        return [
            [['ingredient', 'benefit', 'howtouse', 'description'], 'Information', 'collapsed' => true],
            [['meta_link', 'meta_title', 'meta_desc', 'meta_keyword'], 'SEO', 'collapsed' => true]
        ];
    }

    public function getProduct() {
        return $this->hasOne(Product::class, ['id' => 'id']);
    }

    public function getProductName() {
        return $this->product->name;
    }

    public function extraFields() {
        return ['productName'];
    }

    public function ngRestExtraAttributeTypes() {
        return [
            'productName' => 'text',
        ];
    }

}
