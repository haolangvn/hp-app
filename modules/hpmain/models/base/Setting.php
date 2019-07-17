<?php

namespace hpmain\models\base;

use Yii;

/**
 * This is the model class for table "{{%main_setting}}".
 *
 * @property string $id
 * @property string $name
 * @property string $value
 * @property string $type
 * @property int $created_at
 * @property int $updated_at
 */
class Setting extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hp_setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'lang_id', 'name', 'type'], 'required'],
            [['lang_id', 'created_at', 'updated_at'], 'integer'],
            [['value', 'type'], 'string'],
            [['id', 'name'], 'string', 'max' => 40],
            [['id', 'lang_id'], 'unique', 'targetAttribute' => ['id', 'lang_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'lang_id' => Yii::t('app', 'Language'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getLang() {
        return \yii\helpers\ArrayHelper::map(\luya\admin\models\Lang::find()->select('id, name')->asArray()->all(), 'id', 'name');
    }

}
