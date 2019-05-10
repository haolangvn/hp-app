<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Currency.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 *
 * @property integer $id
 * @property smallint $is_default
 * @property string $name
 * @property float $value
 */
class Currency extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
//    public $i18n = ['name'];


    public function init() {
        parent::init();

        /**
         * After validation event find out if default has to be set or not. Check if if current value
         * has default to 1, disabled the other default attributes.
         */
        $this->on(self::EVENT_BEFORE_INSERT, function ($event) {
            if ($this->is_default) {
                self::updateAll(['is_default' => false]);
            }
        });

        $this->on(self::EVENT_BEFORE_UPDATE, function ($event) {
            if ($this->is_default) {
                $this->markAttributeDirty('is_default');
                self::updateAll(['is_default' => false]);
            }
        });

        $this->on(self::EVENT_BEFORE_DELETE, function ($event) {
            if ($this->is_default == 1) {
                $this->addError('is_default', Yii::t('model_currency_delete_error_is_default'));
                $event->isValid = false;
            }
        });
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_currency}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-currency';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'is_default' => Yii::t('app', 'Is Default'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['is_default'], 'integer'],
            [['name', 'value'], 'required'],
            [['value'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields() {
        return ['name'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'is_default' => 'toggleStatus',
            'name' => 'text',
            'value' => 'decimal',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['is_default', 'name', 'value']],
            [['create', 'update'], ['is_default', 'name', 'value']],
            ['delete', false],
        ];
    }

}
