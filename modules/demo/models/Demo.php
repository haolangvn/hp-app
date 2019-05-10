<?php

namespace app\modules\demo\models;

use Yii;
use hp\ngrest\NgRestModel;

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
        return '{{%hp_demo}}';
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
            [['parent_id'], 'integer'],
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
            'parent_id' => 'number',
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
            ['list', ['parent_id', 'name', 'desc', 'created_at']],
            [['create', 'update'], ['parent_id', 'name', 'desc']],
            ['delete', true],
        ];
    }

//    public function setParent_id($data) {
//        $this->parent_id = $data;
//        $this->update();
//        // This is triggered when the value from the AngularJS api response tries to save or update the model with $data.
//    }
//
//    public function getParent_id() {
//        return 1;
//        // This is triggered when the active record tries to get the values for the field. This is the basic getter/setter concept of the yii\base\BaseObject.
//    }
}
