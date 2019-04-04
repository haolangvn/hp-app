<?php

namespace common\utils;

/**
 * Description of UNumber
 *
 * @author HAO
 */
class UNumber {

    public static function f($number) {
        return is_numeric($number) ? number_format($number, 0, ',', '.') : $number;
    }

    /**
     * Hàm round làm tròn số phần ngàn về 5 hoặc 0
     * @param type $number 
     */
    public static function round($number) {
        // Tách rời phần ngàn để làm tròn số
//        $prefix = substr($number, 0, -4);
//        $suffix = substr($number, -4);
//
//        if ($suffix <= 2999) {
//            $suffix = '0000';
//        } else if ($suffix <= 7999) {
//            $suffix = '5000';
//        } else if ($suffix <= 9999) {
//            $prefix++;
//            $suffix = '0000';
//        }
//        return $prefix . $suffix;
        if (($number % 1000) > 0) {
            $number = $number - ($number % 1000) + 1000;
        }
        return $number;
        //return (floor($number / 1000)) * 1000;
    }

    public static function strToNum($str) {
        return preg_replace('/[^0-9]/', '', $str);
    }

}
