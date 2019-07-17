<?php

namespace app\widgets;

use hp\utils\UShort;
use yii\helpers\ArrayHelper;

/**
 * Description of NavbarTerms
 *
 * @author HAO
 */
class NavbarTerms extends \yii\base\Widget {

    public function run() {
        return $this->render('navbar-terms', [
                    'items' => $this->getItems(),
        ]);
    }

    public function getItems() {
        $items = ArrayHelper::getValue(ArrayHelper::index(UShort::app()->menu->getLanguageContainer(UShort::app()->composition->langShortCode), null, 'container'), 'footer', false);
        $html = '';

        if ($items) {
            $array = [];
            $i = 0;
            foreach ($items as $item) {
                if ($item['is_hidden']) {
                    $i = $item['id'];
                    $array[$i]['layout'] = '<li class="active"> <a href="#">' . $item['title'] . ' <span class="caret"></span></a><ul>{text}</ul></li>';
                    $array[$i]['text'] = '';
                    continue;
                }

                $array[$i]['text'] .= '<li><a href="' . $item['link'] . '" title="' . $item['title'] . '">' . $item['title'] . '</a></li>';
            }

            if ($array) {
                foreach ($array as $k => $node) {
                    $html .= str_replace('{text}', $node['text'], $node['layout']);
                }
            }
        }
        return $html;
    }

}
