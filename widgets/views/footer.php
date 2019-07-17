<?php

use yii\helpers\Url;
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <ul class="list-unstyled list-inline social-links">
                        <li>
                            <a class="item" href="https://www.facebook.com/perfumeworld.com.vn" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="https://www.instagram.com/perfume.world.2017" target="_blank">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="li-last">
                            <a class="item" href="https://www.youtube.com/channel/UCdXZs7AJo8Ie5sH4nND32Lg" target="_blank">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 footer-block">
                <form class="subscribe__form form-inline" action="/subscribe/pos/" method="post">
                    <div class="form-group subscribe">
                        <input name="Subscribe[email]" type="email" class="form-control" required="" placeholder="Your Email ...">
                        <input class="btn-default btn" type="submit" value="SUBSCRIBE">
                    </div>
                </form>
<!--                <div class="footer-contacts">
                    <address>
                        <i class="icon icon-pointer"></i>Tầng 4A, Vincom Center, 72 Lê Thánh Tôn, P. Bến Nghé, Quận 1, TP HCM
                    </address>
                </div>
                <div class="footer-contacts"><i class="icon icon-call-end"></i>Hotline: 1800 6047 (8h30 - 21h30)</div>-->
            </div>

            <?= $html; ?>

        </div>
        <!-- end footer-top -->
        <div class="row footer-bottom clearfix">
            <div class="col-md-12">
                <div class="pull-left info">
                    <?= $footer_info ?>
                </div>
                <div class="pull-right">
                    <div class="certify">
                        <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=43800" target="_blank">
                            <img src="<?= Url::to('@web/images/certify_bo_cong_thuong.png') ?>" height="50" alt="Perfume World"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
