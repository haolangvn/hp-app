<?php

use hp\utils\UD;
?>
<div class="demo-index box box-primary">
    <div class="box-header"></div>
    <div class="box-body">
        <?php
        UD::demo('Yii Language', "\\hp\\utils\\UShort::app()->language");
        UD::demo('Format Date', "\\hp\\utils\\UFormat::date('now')");
        UD::demo('Format DateTime', "\\hp\\utils\\UFormat::datetime('now')");

        UD::demo('Format Currency', "\\hp\utils\\UFormat::f()->asCurrency(20000000)", 'Format by locale');
        UD::demo('Format Decimal', "\\hp\\utils\\UFormat::f()->asDecimal(20000000)");

        UD::demo('Date Picker', "\\hp\\backend\\components\\DatePicker::widget([
            'name' => 'DatePicker',
            'value' => time(),
        ]);");


        UD::demo('Date Time Picker', "\\hp\\backend\\components\\DateTimePicker::widget([
            'name' => 'DatetimePicker',
            'value' => time(),
        ]);");

        ?>

    </div>
</div>
