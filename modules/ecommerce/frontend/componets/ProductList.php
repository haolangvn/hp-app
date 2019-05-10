<?php

namespace app\modules\ecommerce\frontend\componets;

use luya\helpers\Url;

/**
 * Description of Product
 *
 * @author HAO
 */
class ProductList extends \yii\base\BaseObject {

    public $items = [];
    public $page = null;

    /**
     * 
     * @param type $params
     * @return \yii\db\Query
     */
    public function getItems() {
        $items = [];
        foreach ($this->items as $item) {
            $node = new ProductList();
            $node->items = $item;
            $items[] = $node;
        }
        return $items;
    }

    public function getPage() {
        return $this->page;
    }

    public function getValue($attr, $default = null) {
        if (isset($this->items[$attr])) {
            return $this->items[$attr];
        }
        return $default;
    }

    public function getImage() {
        $url = "https://www.thegioinuochoa.com.vn/uploads/";
        return $url . $this->getValue('pimage');
    }

    public function getUrl() {
        return Url::toRoute(['/ecom/default/item-detail']);
    }

}
