<?php

namespace common\utils;

use Yii;

/**
 * Description of UFormat
 *
 * @author HAO
 */
class UFormat {

    public static function f() {
        return Yii::$app->formatter;
    }

    public static function date($time, $format = null) {
        return Yii::$app->formatter->asDate($time, $format);
    }

    public static function datetime($time, $format = null) {
        return Yii::$app->formatter->asDatetime($time, $format);
    }

    public static function decimal($value, $decimals = null) {
        return Yii::$app->formatter->asDecimal($value, $decimals);
    }

    public static function currency($value, $currency = null) {
        return Yii::$app->formatter->asCurrency($value, $currency);
    }

}
