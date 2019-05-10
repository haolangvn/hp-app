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

    public function run() {
        
        if (UShort::app()->menu->current->alias === 'homepage') {
            return '';
        }
        
        echo '<ul class="breadcrumb">';
        echo '<li class="breadcrumb-item"><a href="' . UShort::app()->menu->getHome() . '">Trang chủ</a></li>';
        foreach (UShort::app()->menu->current->teardown as $item) {
            echo '<li class="breadcrumb-item' . ( $item->isActive ? ' active' : '') . '">';
            echo '<a href="' . $item->link . '">' . $item->title . '</a>';
            echo '</li>';
        }
        echo '</ul>';
        
    }

}
