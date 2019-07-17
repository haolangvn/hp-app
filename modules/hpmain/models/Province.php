<?php

namespace hpmain\models;

use Yii;
use hp\base\NgRestModel;

/**
 * Province.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $region_id
 */
class Province extends NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'hp_location_province';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-main-province';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'region_id' => Yii::t('app', 'Region ID'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'alias'], 'required'],
            [['region_id'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'name' => 'text',
            'alias' => 'text',
            'region_id' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['name', 'region_id']],
            [['create', 'update'], ['name', 'alias', 'region_id']],
            ['delete', false],
        ];
    }

    public static function getAll() {
        return self::find()->orderBy('name')->asArray()->all();
    }

}
