<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
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
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-fr" title="fr" id="fr"></div><a href="http://fr.minus417.com">français</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-es" title="es" id="es"></div><a href="https://www.minus417.com/es">español</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-de" title="de" id="de"></div><a href="https://www.minus417.com/de">Deutsch</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-ru" title="ru" id="ru"></div><a href="https://www.minus417.com/ru-index">русский</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-pt" title="pt" id="pt"></div><a href="https://www.minus417.com/portugues">Português</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-cn" title="cn" id="cn"></div><a href="https://www.minus417.com?section=402">中文</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-il" title="il" id="il"></div><a href="https://www.minus417.com?section=653">עברית</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-cy" title="cy" id="cy"></div><a href="https://www.minus417.com?section=656">Cyprus</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-fi" title="fi" id="fi"></div><a href="https://www.minus417.com?section=719">Finnish</a></li>
                                <li><div class="img-thumbnail flag flag-icon-background flag-icon-pl" title="pl" id="pl"></div><a href="https://www.minus417.com?section=1139">polish</a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->

        <div class="cart">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#cartdropdown" class="product_add">
                <span>
                    <i>Giỏ hàng</i> 
                    <b id="cartcounter">(0)</b>
                </span>
            </a>
            <div class="collapse cart-list" id="cartdropdown">
                <div class="well" id="floatCatItems">

                </div>
                <div class="sub_total"><span>Tổng cộng</span>: <strong>VNĐ <span id="floatTotal" data-currency="$">0.00</span></strong></div>
                <div class="float_bottom">
                    <a href="<?php echo Url::to(['cart/index']); ?>" class="butt_1">Giỏ hàng</a>
                    <!--<a href="/checkout/onepage" class="checkoutBtn butt_2">Procced to Checkout</a>-->
                </div>
            </div>
        </div>
        <div class="login d-none d-md-block">
            <button data-toggle="modal" data-target="#newsLetter">Đăng ký</button>
        </div>

        <div class="search"><button class="searbutton"><span>TÌM KIẾM</span></button>
        </div>
    </div>
</header>

<div class="search_open">
    <div class="container">
        <div>

            <form action="<?= Url::to(['product/search']) ?>" method="get">
                <input type="text" class="form-control" placeholder="Tìm kiếm" name="keyword" value="">
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
                <!--<form action="<?php //echo Url::to(['site/emailsubscribe']);    ?>"  method="post">-->
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
                    <input name="email" type="text" class="form-control" placeholder="Nhập email của bạn" required="true">
                    <?php // echo $form->field($model, 'email')->textInput()  ?>
                    <input type="submit" class="btn btn-primary" value="Tham gia với chúng tôi!">
                </div>

                <div class="check">
                    <input id="check1" type="checkbox" name="newsletter" value="1">
                    <label for="check1">Nhận bản tin mới, ưu đãi đặc biệt và hơn thế nữa!</label>
                </div>
                <?php ActiveForm::end(); ?>
                <!--</form>-->
            </div>
        </div>
    </div>
</div>
