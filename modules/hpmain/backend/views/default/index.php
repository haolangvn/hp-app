<?php

use hp\utils\UTranslate;

/* @var $this yii\web\View */

$this->title = UTranslate::t('Home');
$this->params['title']['small'] = UTranslate::t('Dashboard');
?>

<section class="content main-backend-default-index">
    <div class="row">
        <?php
//        if (\hp\utils\UShort::app()->adminuser->getIdentity()) {
//            $user = \hp\utils\UShort::app()->adminuser->getIdentity();
//            hp\utils\UArray::dump($user->attributes);
//        }
        ?>
    </div>
</section>
