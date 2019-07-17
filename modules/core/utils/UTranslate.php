<?php

namespace hp\utils;

use yii\helpers\ArrayHelper;
use hpmain\models\base\Translate;

/**
 * Description of UTranslate
 *
 * @author HAO
 */
class UTranslate {

    const TYPE_LABEL = 'label';
    const TYPE_BUTTON = 'button';
    const TYPE_MENU = 'menu';
    const TYPE_MODEL = 'model';
    const TYPE_APP = 'app';

    /**
     * ```php
     * UTranslate::t('Hello {username}', UTranslate::TYPE_LABEL, [
     *      '{username}' => \Yii::$app->user->identity->username
     * ]);
     * ```
     * 
     * @param type $string message to translate
     * @param type $category (label|button|menu|model|app)
     * @param type $params
     * @return string
     */
    public static function t($string, $category = self::TYPE_LABEL, $param = []) {
        $lang = ArrayHelper::getValue(UShort::app()->composition, 'langShortCode', 'en');
        $messages = UShort::cache()->getOrSet(['TRANSLATION',
            'lang' => $lang, 'cate' => $category], function() use ($category, $lang) {
            $translations = Translate::find()->where([
                        'category' => $category,
                        'language_code' => $lang
                    ])->all();
            $messages = [];
            foreach ($translations as $row) {
                $messages[$row->message] = $row->translation;
            }
            return $messages;
        }, 0);


        if (isset($messages[$string]))
            return strtr($messages[$string], $param);
        else
            return strtr($string, $param);
    }

}
