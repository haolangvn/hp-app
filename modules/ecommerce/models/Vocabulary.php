<?php

namespace app\modules\ecommerce\models;

use Yii;

/**
 * Vocabulary.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $alias
 * @property string $name
 * @property text $description
 * @property integer $weight
 */
class Vocabulary extends \hp\ngrest\NgRestModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%ec_group_voc}}';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint() {
        return 'api-ecommerce-vocabulary';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'weight' => Yii::t('app', 'Weight'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['alias', 'name'], 'required'],
            [['description'], 'string'],
            [['weight'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes() {
        return [
            'alias' => 'text',
            'name' => 'text',
            'description' => 'textarea',
            'weight' => 'number'
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes() {
        return [
            ['list', ['alias', 'name', 'description', 'weight']],
            [['create', 'update'], ['alias', 'name', 'description', 'weight']],
            ['delete', false],
        ];
    }

    public function ngRestRelations() {
        return [
            ['label' => 'Terms', 'apiEndpoint' => Term::ngRestApiEndpoint(), 'dataProvider' => $this->getTerm()],
//            ['label' => 'Log', 'apiEndpoint' => \hp\ngrest\NgRestLog::ngRestApiEndpoint(), 'dataProvider' => $this->getLog(self::tableName())]
        ];
    }

    public function getTerm() {
        return $this->hasMany(Term::class, ['vid' => 'id']);
    }

}
