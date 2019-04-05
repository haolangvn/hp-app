<?php

use yii\helpers\Url;
use common\utils\UTranslate;
use luya\admin\models\Lang;

/* @var $this yii\web\View */

$this->title = UTranslate::t(UTranslate::TYPE_LABEL, 'Home');
$this->params['title']['small'] = UTranslate::t(UTranslate::TYPE_LABEL, 'Dashboard');
?>

<section class="content main-backend-default-index">
    <div class="row">
        <?php
        echo \common\utils\UFormat::datetime(time());
//        print_r(Lang::find()->asArray()->all());
        ?>
    </div>
</section>
