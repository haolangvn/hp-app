<?php

namespace hp\utils;

/**
 * Description of UDate
 *
 * @author HAO
 */
class UDate {

    public static function date($value, $format = '%A, %e. %B %Y') {
        return strftime($format, $value);
    }

}
