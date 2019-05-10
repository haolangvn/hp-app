<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "{{%ec_nav}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $alias
 * @property string $name
 * @property string $position
 * @property string $route
 * @property string $data_json
 * @property int $is_hidden
 * @property int $is_offline
 * @property int $is_deleted
 * @property int $sort_index
 * @property int $created_at
 * @property int $updated_at
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class Nav extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ec_nav}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_hidden', 'is_offline', 'is_deleted', 'sort_index'], 'integer'],
            [['alias', 'name'], 'required'],
            [['alias', 'name', 'position', 'route'], 'string', 'max' => 125],
            [['data_json', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'route' => Yii::t('app', 'Route'),
            'data_json' => Yii::t('app', 'Data Json'),
            'is_hidden' => Yii::t('app', 'Is Hidden'),
            'is_offline' => Yii::t('app', 'Is Offline'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'sort_index' => Yii::t('app', 'Sort Index'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_desc' => Yii::t('app', 'Meta Desc'),
            'meta_keyword' => Yii::t('app', 'Meta Keyword'),
        ];
    }
}
