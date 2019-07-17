<?php

namespace hpmain\models\base;

use hp\utils\UTranslate as UT;
use hp\validators\GCaptcha;

/**
 * This is the model class for table "{{%ec_contact}}".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $content
 */
class Contact extends \hp\base\ActiveRecord {

    public $captcha;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hp_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['fullname', 'phone', 'content'], 'required'],
            [['content'], 'string'],
            [['fullname', 'phone', 'email', 'address', 'subject'], 'string', 'max' => 255],
            ['captcha', GCaptcha::class, 'skipOnEmpty' => !GCaptcha::checkKey()]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'fullname' => UT::t('Fullname', UT::TYPE_MODEL),
            'phone' => UT::t('Phone', UT::TYPE_MODEL),
            'address' => UT::t('Address', UT::TYPE_MODEL),
            'subject' => UT::t('Subject', UT::TYPE_MODEL),
            'content' => UT::t('Message', UT::TYPE_MODEL),
        ];
    }

}
