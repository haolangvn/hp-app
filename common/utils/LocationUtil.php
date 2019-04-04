<?php

namespace common\utils;

use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Description of Location
 *
 * @author HAO
 */
class LocationUtil {

    public static function getProvine() {
        return ArrayHelper::map((new Query())->from('tbl_location_province')
                                ->select('id, name')
                                ->orderBy('name')
                                ->all(), 'id', 'name');
    }

    public static function getDistrict($provine_id = '') {
        return ArrayHelper::map((new Query())->from('tbl_location_district')
                                ->filterWhere(['province_id' => $provine_id])
                                ->select('id, name')
                                ->orderBy('name')
                                ->all(), 'id', 'name');
    }

    public static function get() {
        return UShort::cache()->getOrSet(['LOCATION'], function() {
                    return (new Query())->from('tbl_location_province as p')
                                    ->innerJoin('tbl_location_district as d', 'p.id = d.province_id')
                                    ->select('p.id as p_id, d.id as d_id, p.name as p_name, d.name as d_name')
                                    ->orderBy('p.name, d.name')->all();
                });
    }

}
