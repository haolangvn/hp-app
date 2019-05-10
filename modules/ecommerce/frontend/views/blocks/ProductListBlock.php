<?php

use app\modules\ecommerce\frontend\assets\ProductListAsset;
use yii\helpers\Url;
use hp\utils\UShort;

ProductListAsset::register($this);

$productList = $this->extraValue('productList');
$params = $this->extraValue('params');
?>

<span id="ap_url-filter" class="hidden" data-href="<?= Url::toRoute(['/ecom/api/product']); ?>" data-current="<?= UShort::app()->menu->current->link ?>"></span>
<?php
foreach ($params as $key => $value) {
    echo '<span  class="ap_hidden-data" data-key="' . $key . '" data-value="' . $value . '"></span>';
}
?>

<div id="ap_grid-data" class="row item-list">
    <?=
    $this->render('_items', [
        'items' => $productList->getItems()
    ])
    ?>

    <?=
    $this->render('_page', [
        'page' => $productList->getPage()
    ]);
    ?>
</div>
