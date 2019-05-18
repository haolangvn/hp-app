<?php

namespace hp\base;

use Yii;
use luya\helpers\Url;

/**
 * Description of BaseObject
 *
 * @author HAO
 */
class BaseObject extends \yii\base\BaseObject {

    public $data = [];
    public $items = [];

    /**
     * Get list items
     * @return \hp\base\BaseObject
     */
    public function getItems() {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = Yii::createObject([
                        'class' => $this->className(),
                        'data' => $item
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
    public function getValue($attr, $default = null) {
        if (isset($this->data[$attr])) {
            return $this->data[$attr];
        }
        return $default;
    }

    /**
     * Get data key
     * @return type
     */
    public function getKey() {
        return array_keys($this->data);
    }

    /**
     * Create Image link
     * @param type $attr
     * @return url
     */
    public function getImage($attr) {
        $url = "https://www.minus417.vn/uploads/";
        return $url . $this->getValue($attr);
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
                $params[$v] = $this->getValue($v);
            }
        }
        return Url::toRoute($params);
    }

}
