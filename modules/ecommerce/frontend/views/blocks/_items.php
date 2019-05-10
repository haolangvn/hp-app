<?php

use hp\utils\UTranslate;
use yii\helpers\Url;
use hp\utils\UFormat;

if ($items) {
    foreach ($items as $node) {
        $linkCart = Url::toRoute(['cart/add', 'id' => $node->getValue('id')]);
        ?>
        <div class="col-md-3">
            <div class="product-item">
                <div class="product-item-image">
                    <a href="<?= $node->getUrl() ?>" class="">            
                        <img src="<?php echo $node->getImage(); ?>" />
                    </a>        
                </div>
                <div class="product-item-body">
                    <a href="<?= $node->getUrl() ?>" class="product-name">
                        <?= $node->getValue('pfk_name'); ?>
                    </a>
                    <div class="product-discount">
                        <?= UFormat::decimal($node->getValue('discount')); ?>
                    </div>
                    <div class="product-price">
                        <?= UFormat::decimal($node->getValue('price')); ?>
                    </div>
                    <a href="<?= $linkCart; ?>" title="Add Cart" class="add-cart">
                        <?= UTranslate::t('label', 'Mua Hàng') ?>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
}
?>