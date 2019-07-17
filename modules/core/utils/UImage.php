<?php

namespace hp\utils;

/**
 * Description of UImage
 *
 * @author HAO
 */
class UImage {

    public static function getImageUrl($uri) {
        $domain = 'https://www.perfumeworld.com.vn/uploads/';
//        $domain = '';
        return $domain . $uri;
    }

}
