<?php

namespace hp\grid;

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Description of Boolean
 *
 * @author HAO
 */
class Boolean extends \yii\grid\DataColumn {

    public $attribute = 'is_hidden';
    public $format = 'boolean';
    public $linkOptions = [];
    public $activeIcon = 'glyphicon-ok text-success';
    public $inActiveIcon = 'glyphicon-remove text-danger';

    protected function renderDataCellContent($model, $key, $index) {
        $status = $this->getDataCellValue($model, $key, $index);
        $url = $this->createUrl('change-status', $model, $key, $index);
        $icon = $status ? $this->inActiveIcon : $this->activeIcon;

        return Html::a('<i class="glyphicon ' . $icon . '"></i>', $url, array_merge([
                    'data' => ['method' => 'post'], 'data-pjax' => 0
                                ], $this->linkOptions));
    }

    private function createUrl($action, $model, $key, $index) {
        $params = is_array($key) ? $key : ['id' => (string) $key];
        $params[0] = $action;
        $params['attribute'] = $this->attribute;

        return Url::toRoute($params);
    }

}
