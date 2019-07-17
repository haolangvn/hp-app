<?php

namespace hp\traits;

use Yii;

/**
 * Description of ItemBase
 *
 * @author HAO
 */
trait ItemBase {

    public $item = []; // item detail
    public $items = []; //items detail list
    public $params = []; // query params
    public $page = null; // pagination
    public $provider = null; // data provider

    /**
     * Init
     */
    public function init() {
        if ($this->provider instanceof \yii\data\ActiveDataProvider) {
            $this->items = $this->provider->getModels();
            $this->page = $this->provider->getPagination();
        }
    }

    /**
     * Get list items
     * @return \hp\base\BaseObject
     */
    public function getItems() {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = Yii::createObject([
                        'class' => $this->className(),
                        'item' => $item
            ]);
        }

        return $items;
    }

    /**
     * Get Value by attribute name
     * @param type $attr
     * @param type $default
     * @return value
     */
    public function getVar($attr, $default = null) {
        if (isset($this->item[$attr])) {
            return $this->item[$attr];
        }
        return $default;
    }

    /**
     * Get data key
     * @return type
     */
    public function getKey() {
        return array_keys($this->item);
    }

    /**
     * Create Image link
     * @param type $attr
     * @return url
     */
    public function getImage($attr = 'image') {
        return \hp\utils\UImage::getImageUrl($this->getVar($attr));
    }

    /**
     * Create Url
     * @param type $route
     * @param type $attr
     * @return url
     */
    public function getUrl($route, $attr = []) {
        $params[] = $route;
        if ($attr) {
            foreach ($attr as $v) {
                $params[$v] = $this->getVar($v);
            }
        }
        return \luya\helpers\Url::toInternal($params);
    }

    public function getPage() {
        return $this->page;
    }
    
    public function getParams() {
        return $this->params;
    }

}
