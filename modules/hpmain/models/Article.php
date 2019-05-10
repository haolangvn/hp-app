<?php

namespace hp\models;

use Yii;

/**
 * This is the model class for table "{{%hp_article}}".
 *
 * @property int $id
 * @property string $group
 * @property string $name
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 */
class Article extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%hp_article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 125],
            [['group'], 'string', 'max' => 50],
            ['group', 'default', 'value' => 'Default']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'group' => Yii::t('app', 'Group'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
