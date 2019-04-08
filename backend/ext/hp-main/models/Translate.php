<?php

namespace hp\models;

use luya\admin\models\Lang;
use Yii;

/**
 * This is the model class for table "{{%core_translate}}".
 *
 * @property int $id
 * @property resource $message
 * @property string $category
 * @property string $language_code
 * @property string $translation
 * @property int $created_at
 * @property int $updated_at
 */
class Translate extends \common\core\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%translate}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['message', 'category', 'language_code', 'translation'], 'required'],
            [['message'], 'string', 'max' => 128],
            [['category', 'translation'], 'string', 'max' => 255],
            [['language_code'], 'string', 'max' => 8],
            [['message', 'category', 'language_code'], 'unique', 'targetAttribute' => ['message', 'category', 'language_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'message' => Yii::t('app', 'Message'),
            'category' => Yii::t('app', 'Category'),
            'language_code' => Yii::t('app', 'Language Code'),
            'translation' => Yii::t('app', 'Translation'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getLang($exclude = 'en') {
        return \yii\helpers\ArrayHelper::map(Lang::find()
                                ->where(['!=', 'short_code', $exclude])
                                ->andWhere(['is_deleted' => FALSE])
                                ->asArray()
                                ->all(), 'short_code', 'name');
    }

}
