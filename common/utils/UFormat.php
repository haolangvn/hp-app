<?php

namespace common\utils;

use Yii;

/**
 * Description of UFormat
 *
 * @author HAO
 */
class UFormat {

    public static function date($time, $format = null) {
        return Yii::$app->formatter->asDate($time, $format);
    }

    public static function datetime($time, $format = null) {
        return Yii::$app->formatter->asDatetime($time, $format);
    }

}
