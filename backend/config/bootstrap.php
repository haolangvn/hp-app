<?php

defined('URI_STORAGE_LUYA') or define('URI_STORAGE_LUYA', '/storage');
defined('URI_STORAGE_FINDER') or define('URI_STORAGE_FINDER', '/storage2');

Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@storage', dirname(dirname(__DIR__)) . '/public_html' . URI_STORAGE_LUYA);
Yii::setAlias('@storage_elfinder', dirname(dirname(__DIR__)) . '/public_html' . URI_STORAGE_FINDER);

// Extension
Yii::setAlias('@alexantr/elfinder', dirname(dirname(__DIR__)) . '/backend/ext/alexantr/yii2-elfinder-master/src');
Yii::setAlias('@alexantr/ckeditor', dirname(dirname(__DIR__)) . '/backend/ext/alexantr/yii2-ckeditor-master/src');
Yii::setAlias('@alexantr/tinymce', dirname(dirname(__DIR__)) . '/backend/ext/alexantr/yii2-tinymce-master/src');
