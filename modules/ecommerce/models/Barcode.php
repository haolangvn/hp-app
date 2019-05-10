<?php

namespace app\modules\ecommerce\models;

use Yii;
use luya\admin\ngrest\plugins\SelectRelationActiveQuery;

/**
 * Barcode.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $item_id
 * @property string $barcode
 * @property string $remark
 */
class Barcode extends \hp\ngrest\NgRestModel {

    public function init() {
        parent::init();

        /**
         * After validation event find out if default has to be set or not. Check if if current value
         * has default to 1, disabled the other default attributes.
         */
        $this->on(self::EVENT_BEFORE_INSERT, function ($event) {
            if ($this->is_default) {
                self::updateAll(['is_default' => false], 'item_id=:id', [':id' => $this->item_id]);
            }
        });

        $this->on(self::EVENT_BEFORE_UPDATE, function ($event) {
            if ($this->is_default) {
                $this->markAttributeDirty('is_default');
                self::updateAll(['is_default' => false], 'item_id=:id', [':id' => $this->item_id]);
            }
        });

        $this->on(self::EVENT_BEFORE_DELETE, function ($event) {
            if ($this->is_default == 1) {
                $this->addError('is_default', Yii::t('model_barcode_delete_error_is_default'));
                $event->isValid = false;
            }
        });
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_item_barcode}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-barcode';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'barcode' => Yii::t('app', 'Barcode'),
            'remark' => Yii::t('app', 'Remark'),
            'is_default' => Yii::t('app', 'Is Default')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['item_id', 'barcode'], 'required'],
            [['item_id', 'is_default'], 'integer'],
            [['barcode'], 'string', 'max' => 25],
            [['remark'], 'string', 'max' => 255],
            [['item_id', 'barcode'], 'unique', 'targetAttribute' => ['item_id', 'barcode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'item_id' => [
                'class' => SelectRelationActiveQuery::class,
                'query' => $this->getItem()->select(['id', 'name']),
                'labelField' => ['name'],
                'asyncList' => true
            ],
            'barcode' => 'text',
            'is_default' => 'toggleStatus',
            'remark' => 'textarea',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['itemName', 'barcode', 'is_default']],
            [['create', 'update'], ['item_id', 'barcode', 'is_default', 'remark']],
            ['delete', true],
        ];
    }

    /**
     * 
     * @return Article
     */
    public function getItem() {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }

    public function getItemName() {
        return $this->item->name;
    }

    public function extraFields() {
        return ['itemName'];
    }

    public function ngRestExtraAttributeTypes() {
        return [
            'itemName' => 'text',
        ];
    }
    
    public function ngRestRelations() {
        return [
            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }

}
