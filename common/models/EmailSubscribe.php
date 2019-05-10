<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "{{%email_subscribe}}".
 *
 * @property int $id
 * @property string $email
 * @property int $newsletter
 * @property int $created_at
 */
class EmailSubscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%email_subscribe}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            [['newsletter', 'created_at'], 'integer'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'newsletter' => 'Newsletter',
            'created_at' => 'Created At',
        ];
    }
    
    public static function findEmail($email) {
        return static::findOne(['email' => $email]);
    }
}
