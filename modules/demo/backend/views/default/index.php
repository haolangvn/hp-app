<?php

use common\utils\UD;
?>
<div class="demo-index box box-primary">
    <div class="box-header"></div>
    <div class="box-body">
        <?php
        UD::demo('Yii Language', "\\common\\utils\\UShort::app()->language");
        UD::demo('Format Date', "\\common\\utils\\UFormat::date('now')");
        UD::demo('Format DateTime', "\\common\\utils\\UFormat::datetime('now')");

        UD::demo('Format Currency', "\\common\utils\\UFormat::f()->asCurrency(20000000)", 'Format by locale');
        UD::demo('Format Decimal', "\\common\\utils\\UFormat::f()->asDecimal(20000000)");

        UD::demo('Date Picker', "\\common\\components\\DatePicker::widget([
            'name' => 'DatePicker',
            'value' => time(),
            // Mọi thứ để common lo
        ]);");


        UD::demo('Date Time Picker', "\\common\\components\\DateTimePicker::widget([
            'name' => 'DatetimePicker',
            'value' => time(),
            // Mọi thứ để common lo
        ]);");


//        common\utils\UArray::dump(\mdm\admin\components\MenuHelper::getAssignedMenu(common\utils\UShort::user()->id));

        ?>

    </div>
</div>
