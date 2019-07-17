<?php

use hp\utils\UD;
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

        UD::demo('CKEditer', "alexantr\\ckeditor\\CKEditor::widget([
    'name' => 'attributeName',
]);");

        UD::demo('TinyMCE', "alexantr\\tinymce\\TinyMCE::widget([
    'name' => 'attributeName',
    'clientOptions' => [
        'plugins' => ['advlist', 'anchor', 'charmap', 'image', 'hr', 'imagetools', 'link', 'lists', 'media', 'paste', 'table'],
        'height' => 500,
        'convert_urls' => false,
        'invalid_elements' => 'acronym,font,center,nobr,strike,noembed,script,noscript',
        'file_picker_callback' => alexantr\\elfinder\\TinyMCE::getFilePickerCallback(['/main/file/tinymce']),
    ],
]);")
        ?>

    </div>
</div>
