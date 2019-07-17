<?php

namespace hpmain\models\base;

use Yii;

/**
 * This is the model class for table "hp_article".
 *
 * @property int $id
 * @property string $name
 * @property string $group
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 */
class Article extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hp_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 125],
            [['group'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'group' => Yii::t('app', 'Group'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
