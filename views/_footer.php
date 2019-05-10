<?php

use yii\helpers\Url;
?>
<footer class="footer">
    <div class="container">
        <div class="footer_block">
            <ul class="footer_nav">
                <?php
                foreach (Yii::$app->menu->find()->container('footer')->root()->all() as $item) {
                    echo '<li><a href="' . $item->link . '">' . $item->title . '</a></li>';
                }
                ?>
            </ul>
            <div class="copyright">
                <p>CÔNG TY CỔ PHẦN THƯƠNG MẠI THẾ GIỚI NƯỚC HOA CHUYÊN CUNG CẤP MỸ PHẨM CAO CẤP -417 CHỨA KHOÁNG CHẤT QUÝ KẾT HỢP CÁC THÀNH PHẦN HOÀN TOÀN TỰ NHIÊN NHƯ KHOÁNG CHẤT CÂN BẰNG DƯỠNG CHẤT TỪ BIỂN CHẾT, VITAMIN GIÀU NĂNG LƯỢNG VÀ CHIẾT XUẤT TỪ CÁC LOÀI THỰC VẬT ĐỘC ĐÁO CÓ TÁC DỤNG TÁI TẠO TẾ BÀO DA VÀ NGĂN CHẶN DẤU HIỆU LÃO HÓA.<br/>
                    <u style="text-decoration:underline">
                        <strong>TẤT CẢ SẢN PHẨM TỪ -417 KHÔNG CHỨA PARABEN VÀ DẦU KHOÁNG.</strong>
                    </u>
                </p>

                <p>&nbsp;</p>

                <p>WE ARE CRUELTY FREE –  CHÚNG TÔI TUYỆT ĐỐI KHÔNG THỬ NGHIỆM SẢN PHẨM TRÊN ĐỘNG VẬT</p>

                <div class="text-center"><img src="<?= Url::to('@web/images/veganfr.png') ?>" alt="vegan friendly logo" width="82">

                </div>
                <div class="social">
                    <ul>
                        <li><a href="https://www.linkedin.com/company/minus-417" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://instagram.com/minus417official" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/minus417" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/minus417" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
$urlCart = Url::to(['cart/showcart']);
$js = <<< JS
/*window.onload = function () { */
    $.getJSON('{$urlCart}', function( rs ) {
        $("#floatCatItems").html(rs.data);
        $("#floatTotal").html(rs.cost);
        $("#cartcounter").html('('+rs.quantity+')');
    });
    
    
/*}; end window.onload*/
JS;
$this->registerJs($js, yii\web\View::POS_END);
?>