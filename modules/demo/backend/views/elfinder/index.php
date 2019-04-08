<?php

use common\utils\UD;
?>
<div class="demo-index box box-primary">
    <div class="box-header"></div>
    <div class="box-body">
        <?php
        UD::demo('Elfiner Input', "\\alexantr\\elfinder\\InputFile::widget([
            'name' => 'attributeName',
            'clientRoute' => '/main/file/input',
            'filter' => ['image'],
            'preview' => function (\$value) {
                return yii\helpers\Html::img(\$value, ['width' => 200]);
            },
        ]);");
        
        UD::demo('Elfiner TextArea Muiltiple', "\\alexantr\\elfinder\\InputFile::widget([
            'name' => 'attributeName',
            'clientRoute' => '/main/file/input',
            'filter' => ['image'],
            'textarea' => true,
            'multiple' => true,
        ]);");
        
        
        UD::demo('Elfiner', "alexantr\\elfinder\\ElFinder::widget([
            'connectorRoute' => '/main/file/connector',
            'settings' => [
                'height' => '500px',
                'width' => '100%'
            ],
            'buttonNoConflict' => true,
        ]);");

        ?>

    </div>
</div>
