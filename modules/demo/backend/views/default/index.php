<?php

use hp\utils\UD;
use yii\helpers\Url;
?>
<div class="demo-index box box-primary">
    <div class="box-header"></div>
    <div class="box-body">
        <?php
        UD::demo('Yii Language', "\\hp\\utils\\UShort::app()->language");
        UD::demo('Format Date', "\\hp\\utils\\UFormat::date('now')");
        UD::demo('Format DateTime', "\\hp\\utils\\UFormat::datetime('now')");

//        UD::demo('Format Currency', "\\hp\utils\\UFormat::f()->asCurrency(20000000)", 'Format by locale');
        UD::demo('Format Decimal', "\\hp\\utils\\UFormat::f()->asDecimal(20000000)");

        UD::demo('Date Picker', "\\hp\\widget\\DatePicker::widget([
            'name' => 'DatePicker',
            'value' => time(),
        ]);");


        UD::demo('Date Time Picker', "\\hp\\widget\\DateTimePicker::widget([
            'name' => 'DatetimePicker',
            'value' => time(),
        ]);");
        ?>

        <h4>Extension</h4>
        <blockquote>
            <ul>
                <li><a href="<?= Url::toRoute(['elfinder/index']) ?>">Elfinder</a></li>
            </ul>
        </blockquote>
    </div>
</div>
