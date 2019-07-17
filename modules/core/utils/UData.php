<?php

namespace hp\utils;

use Yii;

/**
 * Description of UData
 *
 * @author Hao Lang
 */
class UData {

    public static function boolean() {
        return [
            0 => 'No',
            1 => 'Yes'
        ];
    }

    public static function publish($time = null) {
        $arr = [
            -1 => 'Ignore',
            0 => 'Not Publish',
            1 => 'Publish',
            
        ];

        if ($time && $time > 1) {
            $arr[$time] = 'Published At ' . Yii::$app->formatter->asDatetime($time);
        }

        return $arr;
    }

    public static function system() {
        return [
            'Thế Giới Nước Hoa' => 'Thế Giới Nước Hoa',
            'Perfume World' => 'Perfume World',
            'Minus 417' => 'Minus 417'
        ];
    }

}
