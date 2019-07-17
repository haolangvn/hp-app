<?php

namespace hp\utils;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use hp\utils\UShort;
use hpmain\models\base\Setting;

/**
 * Description of UConfig
 *
 * @author HAO
 */
class UConfig {

    /**
     * ```php
     * UConfig::get('key');
     * ```
     * or
     * ```php
     * UConfig::get('key', 'attribute');
     * ```
     * 
     * @param type $id
     * @param type $attribute
     * @return string
     */
    public static function get($id, $attribute = null, $default = null) {
        $config = UShort::db()->createCommand('SELECT * FROM ' . Setting::tableName() . ' WHERE id=:id AND lang_id=:lang_id')
                ->bindValue(':id', $id)
                ->bindValue(':lang_id', UShort::getParams(['global_vars', 'lang_id'], 1))
                ->queryOne();

        if ($config !== null) {
            if ($attribute !== null) {
                return ArrayHelper::getValue(Json::decode($config['value']), [$attribute, 'value'], $default);
            }

            return ArrayHelper::getValue($config, 'value', $default);
        }

        return $default;
    }

    public static function init() {
//        $vars['lang_id'] = UShort::db()->createCommand('SELECT id FROM ' . \luya\admin\models\Lang::tableName() . ' WHERE is_deleted = false AND short_code=:code')
//                ->bindValue(':code', UShort::app()->composition->langShortCode)
//                ->queryScalar();
//        
//        $vars['price_list_id'] = UShort::db()->createCommand('SELECT id FROM ' . \hpec\models\PriceList::tableName() . ' WHERE is_deleted=false AND is_hidden=false AND is_default=true AND (effective_at is NULL OR effective_at<=UNIX_TIMESTAMP()) AND (expries_at IS NULL OR expries_at>=UNIX_TIMESTAMP())')
//                ->queryScalar();
//
//        $vars['layout'] = UShort::db()->createCommand('SELECT count(itm.nav_id) as nav_count, max(itm.timestamp_update) nav_updated'
//                        . ' FROM ' . \luya\cms\models\NavItem::tableName() . ' as itm'
//                        . ' LEFT JOIN ' . \luya\cms\models\Nav::tableName() . ' as nav ON itm.nav_id=nav.id'
//                        . ' WHERE itm.nav_item_type IN (1,2,3) AND nav.is_hidden = false')
//                ->queryOne();
//        $vars['layout']['lang_code'] = UShort::app()->composition->langShortCode;
//
//        UShort::setParams('global_vars', $vars);
//        UArray::dump(UShort::getParams('global_vars'));
//        UShort::setFlash(Json::encode($vars));
    }

}
