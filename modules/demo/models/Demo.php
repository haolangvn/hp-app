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
            'deadline' => Yii::t('app', 'Deadline'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'desc'], 'required'],
            [['desc'], 'string'],
            [['name'], 'string', 'max' => 225],
            // ensure empty values are stored as NULL in the database
            ['deadline', 'default', 'value' => 0],
            // validate the date and overwrite `deadline` with the unix timestamp
            ['deadline', 'datetime', 'timestampAttribute' => 'deadline'],
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
            [['create', 'update'], ['name', 'desc']],
            ['delete', true],
        ];
    }

}
