<?php

namespace app\widgets;

use luya\cms\models\Nav;
use hp\utils\UShort;
use hpec\Config;
use hp\Config as ConfigHP;
use hpec\models\base\Product;
use hp\models\base\Article;
use luya\cms\models\NavItemPageBlockItem as BlockItem;

/**
 * Description of Content
 *
 * @author HAO
 */
class Content extends \yii\base\Widget {

    private $content = null;

    /**
     * Page Block Item
     * @var type 
     */
    private $item_page = null;
    // Cache Key
    private $cache_key;

    public function init() {
        parent::init();

        $this->content = UShort::getParams('content', null);

        $current = UShort::app()->menu->current;
        if ($current) {
            $this->item_page = Nav::findOne($current->itemArray['nav_id'])
                    ->activeLanguageItem
                    ->getType();

            $this->cache_key['page_id'] = $this->item_page->id;
//            $this->cache_key['layout_id'] = $this->item_page->layout_id;
//            $this->cache_key['version'] = $this->item_page->version_alias;

            $this->cache_key['block_update'] = UShort::db()->createCommand('SELECT max(timestamp_update)'
                            . ' FROM ' . BlockItem::tableName()
                            . ' WHERE nav_item_page_id=:id AND is_hidden=false')
                    ->bindValue(':id', $this->item_page->id)
                    ->queryScalar();

            // Content
            $this->cache_key['count_product'] = Config::db()->createCommand('SELECT count(id)'
                            . ' FROM ' . Product::tableName()
                            . ' WHERE status=true AND is_hidden=false')
                    ->queryScalar();
            $this->cache_key['max_article'] = ConfigHP::db()->createCommand('SELECT max(updated_at)'
                            . ' FROM ' . Article::tableName())
                    ->queryScalar();


            UShort::setParams('content_vars', $this->cache_key);
        }

//        UShort::setFlash(\luya\helpers\Json::encode(UShort::getParams('layout_vars')));
//        UShort::setFlash(\luya\helpers\Json::encode(UShort::getParams('content_vars')), 'danger');
//        UShort::setFlash(\luya\helpers\Json::encode(UShort::getParams('ecom')));
    }

    public function run() {
        if ($this->item_page) {
            // Disable content cách when request isPOST 
            if (UShort::request()->isPost) {
                return $this->item_page->getContent();
            }

            // Cache content by KEY
            return UShort::cache()->getOrSet($this->cache_key, function() {
                        return ($this->content) ? $this->content : $this->item_page->getContent();
                    }, 0);
        }
//        if (UShort::app()->has('adminuser') && !UShort::app()->adminuser->isGuest && UShort::controller()->module->overlayToolbar === true) {
//            $this->view->registerCssFile('//fonts.googleapis.com/icon?family=Material+Icons');
//            $this->view->on(\luya\web\View::EVENT_BEGIN_BODY, [$this, 'renderToolbar'], ['content' => '']);
//        }
    }

}
