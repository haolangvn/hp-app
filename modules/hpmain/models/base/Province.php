<?php

namespace hpmain\models\base;

use Yii;

/**
 * This is the model class for table "{{%location_province}}".
 *
 * @property string $id
 * @property string $name
 * @property string $alias
 * @property int $region_id
 */
class Province extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hp_location_province';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'region_id'], 'integer'],
            [['name', 'alias'], 'required'],
            [['name', 'alias'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'region_id' => Yii::t('app', 'Region ID'),
        ];
    }

}
