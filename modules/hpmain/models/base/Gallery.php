<?php

namespace hpmain\models\base;

use Yii;

/**
 * This is the model class for table "hp_gallery".
 *
 * @property int $id
 * @property int $pk
 * @property string $table_name
 * @property string $name
 * @property string $uri
 * @property int $width
 * @property int $height
 * @property int $filesize
 * @property int $created_at
 * @property int $updated_at
 */
class Gallery extends \hp\base\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hp_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['pk', 'table_name', 'uri'], 'required'],
            [['pk', 'width', 'height', 'filesize', 'created_at', 'updated_at'], 'integer'],
            [['table_name'], 'string', 'max' => 50],
            [['name', 'uri'], 'string', 'max' => 125],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'pk' => Yii::t('app', 'Pk'),
            'table_name' => Yii::t('app', 'Table Name'),
            'name' => Yii::t('app', 'Name'),
            'uri' => Yii::t('app', 'Uri'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'filesize' => Yii::t('app', 'Filesize'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function q($table_name, $pk, $limit = 4) {
        return self::find()->where([
                            'table_name' => $table_name,
                            'pk' => $pk
                        ])
                        ->limit(4)
                        ->orderBy('created_at desc')
                        ->select('uri');
    }

}
