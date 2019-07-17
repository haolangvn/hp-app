<?php

namespace hpmain\models\base;

use Yii;

/**
 * This is the model class for table "{{%location_district}}".
 *
 * @property string $id
 * @property int $province_id
 * @property string $name
 */
class District extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hp_location_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'province_id'], 'integer'],
            [['province_id', 'name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'province_id' => Yii::t('app', 'Province ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

}
