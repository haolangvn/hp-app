<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Producer Article.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $image_id
 * @property string $image
 * @property text $image_list
 * @property text $description
 * @property text $history
 * @property string $meta_link
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class ProducerArticle extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_producer_article}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-producerarticle';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'image_id' => Yii::t('app', 'Image ID'),
            'image' => Yii::t('app', 'Image'),
            'image_list' => Yii::t('app', 'Image List'),
            'description' => Yii::t('app', 'Description'),
            'history' => Yii::t('app', 'History'),
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
            [['image_list', 'description', 'history'], 'string'],
            [['image', 'meta_link', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'image' => 'text',
            'image_id' => 'image',
            'image_list' => 'imageArray',
            'description' => 'textarea',
            'history' => 'textarea',
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
            ['list', ['producerName', 'image_id']],
            [['create', 'update'], ['image_id', 'image', 'image_list', 'description', 'history', 'meta_link', 'meta_title', 'meta_desc', 'meta_keyword']],
            ['delete', true],
        ];
    }

    public function ngRestAttributeGroups() {
        return [
            [['meta_link', 'meta_title', 'meta_desc', 'meta_keyword'], 'SEO', 'collapsed' => true]
        ];
    }

    public function getProducer() {
        return $this->hasOne(Producer::class, ['id' => 'id']);
    }

    public function getProducerName() {
        return $this->producer->name;
    }

    public function extraFields() {
        return ['producerName'];
    }

    public function ngRestExtraAttributeTypes() {
        return [
            'producerName' => 'text',
        ];
    }

}
