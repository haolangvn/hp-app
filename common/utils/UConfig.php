<?php

namespace common\utils;

use common\models\Setting;
use common\utils\UShort;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * Description of UConfig
 *
 * @author HAO
 */
class UConfig {

    public static function get($id, $attribute = null) {
        $config = Setting::findOne($id);
        if ($config !== null) {

            if ($attribute === null) {
                return $config->value;
            }

            return ArrayHelper::getValue(Json::decode($config->value), "{$attribute}.value");
        }
        return null;
    }

    public static function getParams() {
        $config = Setting::findOne('params');
        if ($config) {
            $data = Json::decode($config->value);
            foreach ($data as $key => $node) {
                UShort::setParams($key, ArrayHelper::getValue($node, 'value'));
            }
        }
    }

}
