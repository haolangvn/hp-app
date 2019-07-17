<?php

namespace app\widgets;

use yii\base\Widget;
use hp\utils\UShort;

/**
 * Description of Breadkrumbs
 *
 * @author hao
 */
class Breadcrumbs extends Widget {

    public $items = null;

    public function init() {
        parent::init();
        $this->items = UShort::getParams('breadcrumbs', null);
        if ($this->items === null) {
            foreach (UShort::app()->menu->current->teardown as $item) {
                $this->items[] = ['title' => str_replace('{lead}', '', $item->title), 'link' => $item->link, 'isActive' => $item->isActive];
            }
        }
    }

    public function run() {
        echo '<section id="row-breadcrumb"><div class="container">
        <div class="col-md-12">
                <div class="row"><nav aria-label="breadcrumb mb-3">';
//        if (UShort::app()->menu->current->alias !== 'homepage') {
        echo '<ol class="breadcrumb breadcrumb-instro">';
        echo '<li class="breadcrumb-item"><a href="' . UShort::app()->menu->getHome() . '"><i class="fa fa-forward" aria-hidden="true"></i>Trang chủ</a></li>';

        if ($this->items) {
            foreach ($this->items as $item) {
                $active = (isset($item['isActive']) && $item['isActive'] == true) ? 'active' : '';
                echo '<li class="breadcrumb-item ' . $active . '">';
                echo '<a href="' . $item['link'] . '">' . $item['title'] . '</a>';
                echo '</li>';
            }
        }
        echo '</ol>';
//        }
        echo '</nav></div>
            </div>
    </div></section>';
    }

}
