<?php

namespace app\modules\demo\models;

use Yii;
use common\core\NgRestModel;

/**
 * Demo.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $name
 * @property text $desc
 * @property integer $created_at
 */
class Demo extends NgRestModel {

    /**
     * @inheritdoc
     */
//    public $i18n = ['name', 'desc'];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '1_demo';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-demo-demo';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'desc' => Yii::t('app', 'Desc'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'desc'], 'required'],
            [['desc'], 'string'],
            [['created_at'], 'integer'],
            [['name'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'name' => 'text',
            'desc' => 'textarea',
            'created_at' => 'datetime',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['name', 'desc', 'created_at']],
            [['create', 'update'], ['name', 'desc', 'created_at']],
            ['delete', false],
        ];
    }

}
