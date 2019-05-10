<?php

namespace hp\utils;

use hp\models\Setting;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

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

            return ArrayHelper::getValue(Json::decode($config->value), [$attribute, 'value']);
        }
        
        return null;
    }

}
