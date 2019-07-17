<?php

use yii\helpers\Url;

return [
    'simple' => [
        'filebrowserBrowseUrl' => Url::to(['/main/file/ckeditor']),
        'filebrowserImageBrowseUrl' => Url::to(['/main/file/ckeditor', 'filter' => 'image']),
        'extraPlugins' => 'autogrow,colorbutton,colordialog,iframe,justify,showblocks,format,font',
        'removePlugins' => 'resize',
        'autoGrow_maxHeight' => 900,
//        'uiColor' => '#ffffff',
        'language' => 'us',
        'startupFocus' => true,
        'toolbar' => [
//            ['name' => 'styles', 'items' => ['Format', 'FontSize']],
            ['name' => 'colors', 'items' => ['TextColor', 'BGColor']],
//            ['name' => 'align', 'items' => ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']],
            ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Strike', 'RemoveFormat']],
//            ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']],
//            ['name' => 'links', 'items' => ['Link', 'Unlink']],
//            ['name' => 'insert', 'items' => ['Image', 'Table']],
//            ['name' => 'tools', 'items' => ['Maximize', 'Source']],
        ],
        'allowedContent' => true,
    ],
    'default' => [
        'filebrowserBrowseUrl' => Url::to(['/main/file/ckeditor']),
        'filebrowserImageBrowseUrl' => Url::to(['/main/file/ckeditor', 'filter' => 'image']),
        'extraPlugins' => 'autogrow,colorbutton,colordialog,iframe,justify,showblocks,format,font',
        'removePlugins' => 'resize',
        'autoGrow_maxHeight' => 900,
//    'uiColor' => '#ffffff',
        'language' => 'us',
        'startupFocus' => true,
        'toolbar' => [
//        ['name' => 'document', 'items' => ['Print']],
//        ['name' => 'clipboard', 'items' => ['Undo', 'Redo']],
            ['name' => 'styles', 'items' => ['Format', 'FontSize']],
            ['name' => 'colors', 'items' => ['TextColor', 'BGColor']],
            ['name' => 'align', 'items' => ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']],
            ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Strike', 'RemoveFormat']],
            ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']],
            ['name' => 'links', 'items' => ['Link', 'Unlink']],
            ['name' => 'insert', 'items' => ['Image', 'Table']],
            ['name' => 'tools', 'items' => ['Maximize', 'Source']],
//        ['name' => 'editing', 'items' => ['Scayt']],
//        ['name' => 'editing', 'items' => []],
//        ['name' => 'editing', 'items' => []],
        ],
//    'removeButtons' => 'Underline,Strike,Subscript,Superscript,Styles,Specialchar',
        'allowedContent' => true,
//    'stylesSet' => [
//        ['name' => 'Subscript', 'element' => 'sub'],
//        ['name' => 'Superscript', 'element' => 'sup'],
//    ],
    ],
    'full' => [],
];
