<?php

namespace app\widgets;

use hp\utils\UShort;
use yii\helpers\ArrayHelper;

/**
 * Description of Footer
 *
 * @author HAO
 */
class Footer extends \yii\base\Widget {

    public function run() {
        $key[] = 'FOOTER';
        $key[] = UShort::getParams(['global_vars', 'layout'], 0);

        return UShort::cache()->getOrSet($key, function() {
                    return $this->render('footer', [
                                'html' => '',
                                'footer_info' => \hp\utils\UConfig::get('footer_info')
                    ]);
                }, 0);
    }

    public function getItems() {
        $template = '<div class="col-md-3 col-sm-3 col-xs-12 footer-block">'
                . '<div class="footer-header"><h3 class="title">{header}</h3></div>'
                . '<div class="footer-body"><ul>{body}</ul></div>'
                . '</div>';
        $html = '';

        $items = ArrayHelper::getValue(ArrayHelper::index(UShort::app()->menu->getLanguageContainer(UShort::app()->composition->langShortCode), null, 'container'), 'footer', false);
        if ($items) {
            $i = 0;
            foreach ($items as $item) {

                if ($item['is_hidden']) {
                    $i = $item['id'];
                    $tmp[$i]['template'] = str_replace('{header}', $item['title'], $template);
                    $tmp[$i]['body'] = '';
                    continue;
                }

                if (!isset($tmp[$i])) {
                    continue;
                }

                $tmp[$i]['body'] .= '<li><a href="' . $item['link'] . '" title="' . $item['title'] . '">' . $item['title'] . '</a></li>';
            }

            if ($tmp) {
                foreach ($tmp as $k => $node) {
                    $html .= str_replace('{body}', $node['body'], $node['template']);
                }
            }
        }
        return $html;
    }

}
