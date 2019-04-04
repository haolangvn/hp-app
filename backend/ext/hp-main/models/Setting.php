<?php

namespace hp\models;

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
class Setting extends \common\core\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'value'], 'required'],
            [['value', 'type'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'name'], 'string', 'max' => 40],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
