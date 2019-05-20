<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="main_wrapper">
    <div class="container">
        <div class="logo">
            <a href="<?= Url::home() ?>">
                <?php
                $logo = strip_tags(\hp\utils\UConfig::get('home-logo'), '<img>');
                if ($logo == '') {
                    $logo = Html::img('@web/images/logo.svg', ['alt' => 'Minus 417']);
                }
                echo $logo;
                ?>
            </a>
        </div>
        <?= app\widgets\Navbar::widget() ?>
    </div>
</div>