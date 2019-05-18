<?php

namespace hp\models;

use Yii;

/**
 * This is the model class for table "{{%hp_store}}".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $image
 * @property string $system
 * @property string $province
 * @property string $region
 * @property string $content
 * @property int $status
 * @property int $weight
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Store extends \hp\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hp_store}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'system', 'province', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'weight', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'alias', 'phone', 'email', 'address', 'image'], 'string', 'max' => 255],
            [['system'], 'string', 'max' => 100],
            [['province', 'region'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'image' => Yii::t('app', 'Image'),
            'system' => Yii::t('app', 'System'),
            'province' => Yii::t('app', 'Province'),
            'region' => Yii::t('app', 'Region'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'weight' => Yii::t('app', 'Weight'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
