<?php

namespace hp\models;

use Yii;

/**
 * This is the model class for table "{{%core_language}}".
 *
 * @property string $code Language code: "vi" or "vi_VN".
 * @property string $name Language name in English.
 * @property string $native Native language name.
 * @property int $is_default
 */
class Language extends \common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%main_language}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'native'], 'required'],
            [['is_default'], 'integer'],
            [['code'], 'string', 'max' => 12],
            [['name', 'native'], 'string', 'max' => 64],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'native' => Yii::t('app', 'Native'),
            'is_default' => Yii::t('app', 'Is Default'),
        ];
    }
}
