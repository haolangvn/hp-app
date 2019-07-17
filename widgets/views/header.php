<?php

use luya\helpers\Url;
use yii\helpers\Html;
use hp\utils\UTranslate as UT;
?>

<header class="header">
    <div class="container">
        <div class="header-inner">
            <div class="hidden-md hidden-lg row" id="top-hotline">
                <div class="hotline-list">
                    <div class="hotline-item col-xs-6">
                        <span class="hotline-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="hotline-number">1800 6047</span>
                        <span class="hotline-info">(ĐẶT HÀNG)</span>
                    </div>
                    <div class="hotline-item col-xs-6">
                        <span class="hotline-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="hotline-number">1800 6077</span>
                        <span class="hotline-info">(CSKH)</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-5 col-xs-8">
                    <a href="<?= Url::home() ?>" class="logo">
                        <?= $logo; ?>
                    </a>
                </div>
                <div class="col-md-5 col-sm-5 hidden-xs">
                    <div class="row-fluid">
                        <div class="teaser hidden-sm hidden-xs">
                            <?= $notify ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="header-search clearfix col-md-6 col-sm-12 hidden-xs">
                            <div class="header-search">
                                <form class="form-search" action="<?= Url::toInternal(['ecom/product/search']) ?>">
                                    <input class="txt-search" type="text" name="keyword" required="true" placeholder="<?= UT::t('Keyword') ?>" />
                                    <button type="submit" class="btn-search">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- end header-search -->
                        <div class="col-md-6 hidden-sm hidden-xs">
                            <?=
                            Html::dropDownList('brand', null, $brands, [
                                'class' => 'selectpicker',
                                'prompt' => UT::t('Select Brand'),
                                'data-live-search' => 'true',
                                'onchange' => 'alert(this.value)'
                            ])
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm hidden-xs">
                    <div class="row-fluid" id="hotline">
                        <div class="col-md-6">
                            <span class="information"><b>CSKH:</b> T2-T6 (8h30 - 17h)</span>
                            <span class="number">1800 6077</span>
                        </div>
                        <div class="col-md-6">
                            <span class="information"><b>Đặt hàng:</b> (8h30 - 21h30)</span>
                            <span class="number">1800 6047</span>
                        </div>
                    </div> </div>
                <div class="col-md-1 col-sm-2 col-xs-4 cart-and-cate">
                    <div class="row-fluid">
                        <div class="cart">
                            <a href="<?= Url::toInternal(['ecom/cart/index']) ?>">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <span id="cart-total" class="number">
                                </span>
                            </a>
                        </div>
                        <div class="hidden-md hidden-sm hidden-lg icon fa fa-bars color_primary nav-category" aria-hidden="true">                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->
        </div>
        <!-- end header-inner-->
    </div>

    <!--NAVIGATION-->
    <div class="container">
        <nav id="ddmenu">
            <div class="menu-icon" tabindex="0"></div>
            <?= $navigation ?>
        </nav>
    </div>

    <!-- end container-->
</header>
