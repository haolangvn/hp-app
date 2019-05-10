<?php

namespace hp\utils;

use yii\helpers\ArrayHelper;
use hp\models\Translate;

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

    public static function t($category = self::TYPE_LABEL, $string, $param = []) {
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
        });


        if (isset($messages[$string]))
            return strtr($messages[$string], $param);
        else
            return strtr($string, $param);
    }

}
