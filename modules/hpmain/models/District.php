<?php

namespace hpmain\models;

use Yii;
use hp\base\NgRestModel;

/**
 * District.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $province_id
 * @property string $name
 */
class District extends NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'hp_location_district';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-main-district';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'province_id' => Yii::t('app', 'Province ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['province_id', 'name'], 'required'],
            [['province_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'province_id' => [
                'selectModel',
                'modelClass' => Province::class,
                'labelField' => 'name'
            ],
            'name' => 'text',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['province_id', 'name']],
            [['create', 'update'], ['province_id', 'name']],
            ['delete', false],
        ];
    }

    public function getProvince() {
        return $this->hasOne(Province::class, ['id' => 'province_id']);
    }

}
