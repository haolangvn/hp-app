<?php

use mdm\admin\components\MenuHelper;
use backend\widgets\Menu;
use hp\utils\UTranslate;

$m = Yii::$app->controller->module->id;
$c = Yii::$app->controller->id;
$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, function ($menu) use ($m, $c) {
            $css = '';
            $active = false;
            $child = ($menu['children']) ? true : false;
            $tmp = explode('/', $menu['route']);
            $mod = \yii\helpers\ArrayHelper::getValue($tmp, 1);
            $con = \yii\helpers\ArrayHelper::getValue($tmp, 2);

            if ($mod === $m && $con === $c) {
                $active = true;
                $css = 'active ';
            }

            if ($child) {
                $css .= 'treeview ';
            }

            if ($child && !$active) {
                foreach ($menu['children'] as $n) {
                    $tmp = explode('/', yii\helpers\ArrayHelper::getValue($n['url'], 0));
                    $mod = \yii\helpers\ArrayHelper::getValue($tmp, 1);
                    $con = \yii\helpers\ArrayHelper::getValue($tmp, 2);

                    if ($mod === $m && $con === $c) {
                        $css = 'treeview active menu-open';
                    }
                    
//                    print_r($n['items']);
                }
            }

            $icon = 'fa-circle-o';
            if ($menu['icon']) {
                $icon = $menu['icon'];
            }

            return [
                'label' => UTranslate::t($menu['name'], UTranslate::TYPE_MENU),
                'url' => [$menu['route']],
                'options' => ['class' => $css],
                'items' => $menu['children'],
                'icon' => '<i class="fa ' . $icon . '"> </i> ',
                'right-icon' => $child ? '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>' : '',
            ];
        });

if (YII_DEBUG) {
//    $items[] = [
//        'label' => Yii::t('app', 'Navigation'),
//        'options' => ['class' => 'header',],
//    ];
    $items[] = [
        'label' => Yii::t('app', 'Yii Tool'),
        'options' => ['class' => 'header',],
    ];

    $items[] = [
        'label' => '<i class="fa fa-file-code-o"></i> <span>' . Yii::t('app', 'Gii') . '</span>',
        'url' => ['/gii']
    ];
    $items[] = [
        'label' => '<i class="fa fa-share"></i> <span>' . Yii::t('app', 'Debug') . '</span>',
        'url' => ['/gii']
    ];
}

echo Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'encodeLabels' => false,
    'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
    'activateParents' => true,
    'items' => $items
]);
?>