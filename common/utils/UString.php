<?php

namespace common\utils;

/**
 * Description of Ustring
 *
 * @author HAO
 */
class UString {

    const SAPARATOR = ' | ';

    public static function strToArray($delimiter, $string) {
        return explode($delimiter, $string);
    }

    public static function arrayToStr($glue, $pieces) {
        return is_array($pieces) ? implode($glue, $pieces) : '';
    }

    public static function toAlias($str) {
        $str = self::toAscii($str);
        $number_list = explode(' ', $str);
        $str = '';
        foreach ($number_list as &$number) {
            if ($number != '')
                $str .= '-' . $number;
        }
        return trim(strtolower(substr($str, 1, strlen($str))));
    }

    public static function toAscii($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/[.,]/", "", $str);
        $str = preg_replace("/[^ A-Za-z0-9]/", " ", $str);
        return $str;
    }

    public static function subString($string, $number) {
        if (strlen($string) <= $number) {
            return $string;
        } else {
            if (strpos($string, " ", $number) > $number) {
                $n = strpos($string, " ", $number);
                $s = substr($string, 0, $n) . "...";
                return $s;
            }
            // trường hợp còn lại không ảnh hưởng tới kết quả 
            $s = substr($string, 0, $number) . "...";
            return $s;
        }
    }

    public static function toArray($string) {
        $attributes = [];
        if (strpos($string, ',') !== false) {
            foreach (explode(',', $string) as $key_value) {
                list($key, $value) = explode(':', $key_value);
                $attributes[trim($key)] = trim($value);
            }
        } else if (strpos($string, ':') !== false) {
            list($key, $value) = explode(':', $string);
            $attributes[trim($key)] = trim($value);
        }
        return $attributes;
    }

    public static function compress($html) {
        $replace = array(
            "#<!--.*?-->#s" => '', // strip comments
            "/\s\s+/" => ' ', // strip excess whitespace
            "/\n/" => '', // strip excess \n
        );
        $search = array_keys($replace);
        $html = preg_replace($search, $replace, $html);
        return str_replace("\r\n", "", $html);
    }

    public static function getTeaser($string, $count) {
        $words = explode(' ', $string);
        if (count($words) > $count) {
            $words = array_slice($words, 0, $count);
            $string = implode(' ', $words);
        }
        return $string;
    }

    public static function curl_get_contents($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

}
