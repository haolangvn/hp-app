<?php

namespace hpmain\cache;

use Yii;
use luya\traits\CacheableTrait;
use luya\cms\models\Nav;
use luya\cms\models\NavItem;
use hp\utils\UShort;
use hpec\Config;

/**
 * Description of PageCache
 *
 * @author HAO
 */
class PageCache extends \yii\filters\PageCache {

    use CacheableTrait;

    /**
     * @var array Define an array with the actions and a corresponding callable function. This will be called whether caching
     * is enabled or not or the response is loaded from the cache.
     *
     * ```php
     * 'actionsCallable' => ['get-posts' => function($result) {
     *     // do something whether is the response cached or not
     * });
     * ```
     * 
     */
    public $actionsCallable = [];

    /**
     * @var array
     * @deprecated Use {{$only}} or {{$except}} instead. Will be removed in 2.0
     */
    public $actions = [];
    public $isCmsRoute = false;

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();

        // support deprecated $actions property
        if (!empty($this->actions)) {
            $this->only = $this->actions;
        }

        if ($this->isCmsRoute) {
            $this->variationCMS();
        }
    }

    /**
     * call the action callable if available.
     *
     * @param string $action The action ID name
     * @param string $result The cahed or not cached action response, this is a string as its after the action filters.
     */
    private function callActionCallable($action, $result) {
        if (isset($this->actionsCallable[$action]) && is_callable($this->actionsCallable[$action])) {
            return call_user_func($this->actionsCallable[$action], $result);
        }
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (!$this->isCachable()) {
            return true;
        }

        $result = parent::beforeAction($action);

        // support legacy property.
        if (!empty($this->actionsCallable)) {
            $contents = $this->callActionCallable($action->id, '');
            if (is_array($contents)) {
                foreach ($contents as $key => $value) {
                    UShort::setParams($key, $value);
                }
            }
        }

        return $result;
    }

    public function variationCMS() {
        $current = Yii::$app->menu->current;
//        $this->duration = \hp\utils\UConfig::get('params', 'cache_duration', 0);
        $this->duration = 0;

        $variations = [];
        if ($current) {
            $current = $current->itemArray;

            // ghi nhận bien biến đổi dữ liệu để refresh cache
            // manaual duration set
            $variations['duration'] = $this->duration;
            $variations['layout']['lang'] = UShort::app()->composition['langShortCode'];
            $variations['layout']['update'] = $current['timestamp_update'];

            // Navigation changes
            $variations['nav'] = UShort::db()->createCommand('SELECT count(itm.nav_id) as count, max(itm.timestamp_update) updated'
                            . ' FROM ' . NavItem::tableName() . ' as itm'
                            . ' LEFT JOIN ' . Nav::tableName() . ' as nav ON itm.nav_id=nav.id'
                            . ' WHERE itm.nav_item_type IN (1,2,3,4) AND nav.is_hidden = false')
                    ->queryOne();

            $this->variations = \yii\helpers\ArrayHelper::merge($variations, (array) $this->variations);
        }

        $ecom['price_list'] = Config::db()->createCommand('SELECT *'
                        . ' FROM ' . \hpec\models\PriceList::tableName()
                        . ' WHERE is_default = 1 AND is_hidden = 0')
                ->queryOne();
        $ecom['currency'] = Config::db()->createCommand('SELECT *'
                        . ' FROM ' . \hpec\models\Currency::tableName()
                        . ' WHERE is_default = 1')
                ->queryOne();

        UShort::setParams('layout_vars', $this->variations);
        UShort::setParams('ecom', $ecom);
    }

}
