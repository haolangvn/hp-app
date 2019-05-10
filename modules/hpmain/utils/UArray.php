<?php

namespace hp\utils;

/**
 * Description of UArray
 *
 * @author HAO
 */
class UArray {

    public static function getYear() {
        $n = date('Y');
        $y = [];
        for ($i = $n; $i >= 1900; $i--) {
            $y[$i] = $i;
        }

        return $y;
    }

    public static function dump($array, $name = null) {
        echo '<pre>';
        if ($name) {
            echo '<h4>' . $name . '</h4>';
        }
        echo '<div style="overflow-y: scroll; max-height: 300px;">';
        print_r($array);
        echo '</div>';
        echo '</pre>';
    }

    public static function filter($array, $allow_key) {
        return array_filter($array, function ($key) use ($allow_key) {
            return in_array($key, $allow_key);
        }, ARRAY_FILTER_USE_KEY);
    }

}
