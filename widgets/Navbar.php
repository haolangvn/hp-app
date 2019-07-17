<?php

namespace app\widgets;

use yii\base\Widget;
use hp\utils\UShort;

/**
 * Description of Menu
 *
 * @author Phong
 */
class Navbar extends Widget {

    public function run() {

        $navigation = UShort::app()->menu->find()->container('navigation')->root()->all();
        $mainNav = '';
        $mobileNav = '';

        foreach ($navigation as $item) {

            $subList = UShort::app()->menu->find()->container($item->alias)->root()->all();
            $url = count($subList) ? '#' : $item->link;

            $mainNav .= '<li class="has-menu">';
            $mainNav .= '<a href="' . $url . '">' . $item->title . '</a>';
            $mobileNav .= '<li><a href="' . $url . '" class="tree-toggle nav-header">' . $item->title . '</a>';


            if ($subList) {
                $mainNav .= $this->getSubMenu($subList);
                $mobileNav .= $this->getSubMenuMobile($subList);
            }
            $mainNav .= '</li>';
            $mobileNav .= '</li>';
        }

        return $this->render('navbar', [
                    'mainNav' => $mainNav,
                    'mobileNav' => $mobileNav,
        ]);
    }

    public function getSubMenu($items, $level = 2) {
        $html = '<ul>';

        foreach ($items as $item) {
            $html .= '<li>';
            $html .= '<ul>';
            $html .= '<li><a href="' . $item->link . '">' . $item->title . '</a></li>';
            $subList = UShort::app()->menu->getLevelContainer($level, $item);
            if ($subList) {
                foreach ($subList as $node) {
                    $html .= '<li><a href="' . $node->link . '">' . $node->title . '</a></li>';
                }
            }
            $html .= '</ul>';
            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    public function getSubMenuMobile($items, $level = 2) {
        $html = '<ul class="nav nav-list tree mobile-level-2" style="display: none;">';
        foreach ($items as $item) {
            $subList = UShort::app()->menu->getLevelContainer($level, $item);
            $html .= '<li>';
            $html .= '<a href="' . (count($subList) ? '#' : $item->link) . '" class="tree-toggle nav-header">' . $item->title . '</a>';
            $html .= '<ul class="nav nav-list tree mobile-level-3" style="display: none;">';

            if ($subList) {
                foreach ($subList as $node) {
                    $html .= '<li><a href="' . $node->link . '">' . $node->title . '</a></li>';
                }
            }
            $html .= '</ul>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

}
