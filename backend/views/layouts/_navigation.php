<?php

use mdm\admin\components\MenuHelper;
use backend\widgets\Menu;
use common\utils\UTranslate;

$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, function ($menu) {
            $active = false;
            $child = ($menu['children']) ? true : false;
            $con = \yii\helpers\ArrayHelper::getValue(explode('/', $menu['route']), 2);
            $c = Yii::$app->controller->id;

            if ($c === $con) {
                $active = true;
            }

            if ($child && !$active) {
                foreach ($menu['children'] as $n) {
                    $c2 = \yii\helpers\ArrayHelper::getValue(explode('/', yii\helpers\ArrayHelper::getValue($n['url'], 0)), 2);
                    if ($c === $c2) {
                        $active = true;
                    }
                }
            }
            $icon = 'fa-circle-o';
            if ($menu['icon']) {
                $icon = $menu['icon'];
            }

            return [
                'label' => UTranslate::t(UTranslate::TYPE_MENU, $menu['name']),
                'url' => [$menu['route']],
                'options' => $child ? ['class' => 'treeview'] : [],
                'items' => $menu['children'],
                'icon' => '<i class="fa ' . $icon . ' - ' . Yii::$app->controller->id . '"> </i> ',
                'right-icon' => $child ? '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>' : '',
                'active' => $active
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