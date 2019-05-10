<?php

use yii\helpers\Url;
use app\modules\ecommerce\frontend\assets\ProductListAsset;

ProductListAsset::register($this);
?>
<span id="ap_url-filter" class="hidden" data-href="<?= Url::toRoute(['/ecom/api/product']); ?>" data-current="<?= Url::toRoute(['/ecom/default/index']) ?>"></span>
<?php
foreach ($params as $key => $value) {
    echo '<span  class="ap_hidden-data" data-key="' . $key . '" data-value="' . $value . '"></span>';
}
?>
<div id="ap_grid-data" class="row item-list">
    <?=
    $this->render('/blocks/_items', [
        'items' => $productList->getItems()
    ])
    ?>

    <?=
    $this->render('/blocks/_page', [
        'page' => $productList->getPage()
    ]);
    ?>
</div>
