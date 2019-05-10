<?php

use yii\helpers\Html;
use hp\utils\UFormat;

// TAG ID:  ap_grid-page => Required for ajax Page
echo Html::beginTag('div', ['id' => 'ap_grid-page', 'class' => 'col-md-12']);
echo Html::beginTag('div', ['class' => 'clearfix text-center']);

$remain = $page->totalCount - ($page->getOffset() + $page->getPageSize());
if ($remain > 0) {
    echo Html::a('Xem thêm ' . UFormat::decimal($remain), '#', [
        'id' => 'ap_btn-more', // ID:ap_btn-more => Required for ajax Page
        'class' => 'readall',
        'onclick' => 'Filter(1); return false',
        'data-page' => $page->getPage() + 2
    ]);
}

echo Html::endTag('div');
echo Html::endTag('div');
// END BUTTON SHOWMORE
?>
