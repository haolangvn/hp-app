<?php

namespace app\widgets;

use hp\utils\UShort;
use yii\helpers\ArrayHelper;

/**
 * Description of Alert
 *
 * @author HAO
 */
class Header extends \yii\base\Widget {

    public function run() {
        $key[] = 'HEADER';
        $key[] = UShort::getParams(['global_vars', 'layout'], 0);

        return UShort::cache()->getOrSet($key, function() {

                    $notify = \hp\utils\UConfig::get('notify');
                    $logo = strip_tags(\hp\utils\UConfig::get('home-logo'), '<img>');
					$brands = [];
                    //$term = \hpec\models\Term::availablelTerm();
                    //$term = \yii\helpers\ArrayHelper::getValue($term, 'producer_id', []);
                    //$brands = \yii\helpers\ArrayHelper::map($term, 'alias', 'name');
                    
                    // Default Logo
                    if (!$logo) {
                        $logo = \luya\helpers\Html::img('@web/images/pw.svg', [
                                    'alt' => 'Perfume World',
//                                    'width' => 290,
                                    'height' => 100
                        ]);
                    }

                    // Default slogan
                    if ($notify === null) {
                        $notify = 'HỆ THỐNG PHÂN PHỐI NƯỚC HOA &amp; MỸ PHẨM CHÍNH HÃNG HÀNG ĐẦU VIỆT NAM VỚI&nbsp;50&nbsp;CỬA HÀNG TRÊN TOÀN QUỐC';
                    }


                    return $this->render('header', [
                                'logo' => $logo,
                                'notify' => $notify,
                                'navigation' => $this->getNavigation(),
                                'brands' => $brands
                    ]);
                }, 0);
    }

    public function getNavigation() {
        $html = str_replace('{cate_name}', \hp\utils\UTranslate::t('Category'), $this->template);
        $html = str_replace('{nav_html}', $this->_getNav(), $html);
        $html = str_replace('{cate_html}', $this->_getCate(), $html);
        return $html;
    }

    public $template = '<ul>'
            . '<li class="full-width">'
            . '<span class="top-heading">{cate_name}</span><i class="caret"></i>'
            . '<div class="dropdown left-aligned"><div class="dd-inner">{cate_html}</div></div>'
            . '</li>'
            . '{nav_html}</ul>';

    private function _getNav() {
        $items = UShort::app()->menu->find()->container('navigation')->root()->all();
        $html = '';
        foreach ($items as $item) {
            $childs = $item->getChildren();
            if (count($childs) > 0) {
                $html .= '<li>';
                $html .= '<span class="top-heading">' . $item->title . '</span> <i class="caret"></i>';
                $html .= $this->_getNavSub($childs);
                $html .= '</li>';
            } else {
                $html .= '<li class="no-sub"><a class="top-heading" href="' . $item->link . '" title="' . $item->title . '">' . $item->title . '</a></li>';
            }
        }

        return $html;
    }

    private function _getNavSub($items) {
        $html = '<div class="dropdown"><div class="dd-inner">';
        $html .= '<ul class="column">';
        foreach ($items as $item) {
            $html .= '<li class="no-sub"><a href="' . $item->link . '" title="' . $item->title . '">' . $item->title . '</a></li>';
//            $childs = $item->getChildren();
//            if ($childs) {
//                $html .= '<li>';
//                $html .= '<span class="top-heading">' . $item->title . '</span> <i class="caret"></i>';
//                $html .= $this->_getNavSub($childs);
//                $html .= '</li>';
//            } else {
//                $html .= '<li class="no-sub"><a href="' . $item->link . '" title="' . $item->title . '">' . $item->title . '</a></li>';
//            }
        }
        $html .= '</ul>';
        $html .= '</div></div>';

        return $html;
    }

    private function _getCate01() {
        $template = '<ul class="column"><li><h3>{header}</h3></li>{body}</ul>';
        $tmp = [];
        $items = ArrayHelper::getValue(ArrayHelper::index(UShort::app()->menu->getLanguageContainer(UShort::app()->composition->langShortCode), null, 'container'), 'category', false);
        $html = '';

        if ($items) {
            $i = 0;
            foreach ($items as $item) {

                if ($item['is_hidden']) {
                    $i = $item['id'];
                    $tmp[$i]['template'] = str_replace('{header}', $item['title'], $template);
                    $tmp[$i]['body'] = '';
                    continue;
                }

                if (!isset($tmp[$i]) || $item['depth'] != 1) {
                    continue;
                }

                $tmp[$i]['body'] .= '<li><a href="' . $item['link'] . '" title="' . $item['title'] . '">' . $item['title'] . '</a></li>';

                $sub_items = UShort::app()->menu->findAll(['parent_nav_id' => $item['nav_id']]);
                $tmp[$i]['body'] .= $this->_getCateSub($sub_items);
            }

            if ($tmp) {
                foreach ($tmp as $k => $node) {
                    $html .= str_replace('{body}', $node['body'], $node['template']);
                }
            }
        }
        return $html;
    }

    private function _getCateSub($items) {
        $html = '';
        if ($items) {
            foreach ($items as $item) {
                $lead = false;
                if (strpos($item->title, '{lead}') !== false) {
                    $lead = true;
                    $item->title = str_replace('{lead}', '', $item->title);
                }
                $sep = ($lead) ? '' : '---';
                $html .= '<li>' . $sep . '<a href="' . $item->link . '" title="' . $item->title . '">' . $item->title . '</a></li>';
            }
        }
        return $html;
    }

    private function _getCate() {
        $html = '';
        $menus = ArrayHelper::index(UShort::app()->menu->getLanguageContainer(UShort::app()->composition->langShortCode), null, 'container');
        $items = UShort::app()->menu->find()->container('category')->root()->all();
        foreach ($items as $item) {
            $html .= '<ul class="column">';
            $html .= '<li><h3>' . $item->title . '</h3></li>';
            $sub = UShort::app()->menu->find()->container($item->alias)->root()->all();
            $html .= $this->_getCateSub($sub);
            $html .= '</ul>';
        }


        return $html;
    }

}
