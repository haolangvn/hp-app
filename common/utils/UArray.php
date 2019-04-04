<?php

namespace common\utils;

use common\utils\UTranslate;

/**
 * Description of UArray
 *
 * @author HAO
 */
class UArray {

    public static function status() {
        return [
            1 => UTranslate::t('Active'),
            0 => UTranslate::t('Inactive')
        ];
    }

    public static function type() {
        return [
            0 => UTranslate::t('Không KM'),
            10 => UTranslate::t('Discount on Header'),
            20 => UTranslate::t('Discount on Lines'),
            31 => UTranslate::t('Free Item'),
        ];
    }

    public static function gender() {
        return [
            1 => UTranslate::t('Men'),
            2 => UTranslate::t('Women'),
            0 => UTranslate::t('Unisex')
        ];
    }

    public static function boolean() {
        return [
            1 => 'True',
            0 => 'False',
        ];
    }

    public static function yesno() {
        return [
            1 => 'Yes',
            0 => 'No',
        ];
    }

    public static function getSettingType() {
        return [
            'text' => 'TextField',
            'textArea' => 'TextArea',
            'image' => 'Image',
            'range' => 'Range'
        ];
    }

    public static function getOrderStatus() {
        return [
            1 => 'Hoàn tất',
            8 => 'Đang đi đường',
            9 => 'Chờ lấy hàng',
            //6 => 'Chuyển cho CH',
            -2 => 'Hủy => Kg có SP',
            -6 => 'Hủy => Hàng đã test',
            -7 => 'Hủy => hàng bị hư',
            -3 => 'Hủy => Khách hủy (đổi ý ko mua)',
            -8 => 'Hủy => Khách đến CH mua',
            -5 => 'Hủy => Trùng ĐH',
            -4 => 'Không liên lạc được',
            7 => '=== Lưu tạm ===',
            0 => '=== Chưa xác nhận ===',
        ];
//        return [
//            1 => 'Hoàn tất',
//            0 => 'Chưa xác nhận',
//            2 => 'Không có sản phẩm',
//            3 => 'Khách hủy Đơn hàng',
//            4 => 'Không liên lạc được',
//            5 => 'Trùng đơn hàng',
//            6 => 'Chuyển cho CH',
//            7 => 'Lưu tạm',
//        ];
    }

    public static function getYear() {
        $n = date('Y');
        $y = [];
        for ($i = $n; $i >= 1900; $i--) {
            $y[$i] = $i;
        }

        return $y;
    }

    public static function dump($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public static function filter($array, $allow_key) {
        return array_filter($array, function ($key) use ($allow_key) {
            return in_array($key, $allow_key);
        }, ARRAY_FILTER_USE_KEY);
    }

}
