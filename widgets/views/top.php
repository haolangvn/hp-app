<?php

use luya\helpers\Url;
use yii\widgets\ActiveForm;
use hp\utils\UTranslate as UT;
?>
<header class="header">
    <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#menuModal" data-backdrop="false"></button>
    <div class="container">
        <!--        <div class="language d-none d-md-block">
                    <button data-toggle="collapse" data-target="#langdropdown">English</button>
                    <div class="collapse lang-list" id="langdropdown">
                        <div class="well">
                            <ul>
        
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-gb" title="gb" id="gb"></div><a href="https://www.minus417.com?section=1">English</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-pl" title="pl" id="pl"></div><a href="https://www.minus417.com?section=1139">polish</a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->

        <div class="cart">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#cartdropdown" class="product_add">
                <span>
                    <i><?= UT::t('Cart') ?></i> 
                    <b id="cartcounter">(<?= $this->renderDynamic('return hp\utils\UShort::app()->cart->getCount();'); ?>)</b>
                </span>
            </a>
            <div class="collapse cart-list" id="cartdropdown">
                <?= $this->renderDynamic('return hpec\frontend\widgets\Cart::widget();'); ?>
            </div>
        </div>
        <div class="login d-none d-md-block hidden-xs">
            <button data-toggle="modal" data-target="#newsLetter"><?= UT::t('Register') ?></button>
        </div>

        <div class="search"><button class="searbutton"><span><?= UT::t('Search') ?></span></button></div>
    </div>
</header>

<div class="search_open">
    <div class="container">
        <div>
            <form action="<?= Url::toInternal(['ecom/product/search']) ?>" method="get">
                <input type="text" class="form-control" placeholder="<?= UT::t('Keyword') ?>" name="keyword" value="">
                <button type="submit" class="sbutton"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="newsLetter" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-custom" style="margin-top: 0px;">
        <div class="modal-content newsletter">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h2>Tham gia với chúng tôi hôm nay</h2>
                <?php
                $form = ActiveForm::begin([
                            'action' => Url::current(),
//                            'fieldConfig' => [
//                                'template' => "{input}\n{hint}",
//                            ],
                            'enableAjaxValidation' => false,
                            'enableClientScript' => false,
                ]);
                ?>
                <div class="form-group">
                    <input name="email" type="text" class="form-control" placeholder="<?= UT::t('Enter Your Email') ?>" required="true">
                    <?php // echo $form->field($model, 'email')->textInput()  ?>
                    <input type="submit" class="btn btn-primary" value="Tham gia với chúng tôi!">
                </div>

                <div class="check">
                    <input id="check1" type="checkbox" name="newsletter" value="1">
                    <label for="check1">Nhận bản tin mới, ưu đãi đặc biệt và hơn thế nữa!</label>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
