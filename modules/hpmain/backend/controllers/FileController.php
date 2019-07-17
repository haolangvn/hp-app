<?php

namespace hpmain\backend\controllers;

use Yii;
use hp\utils\UShort;

class FileController extends \yii\web\Controller {

    /**
     * @return array
     */
    public function actions() {
        $urlPath = UShort::app()->urlManagerFrontend->baseUrl . URI_STORAGE_FINDER;
        $filePath = Yii::getAlias('@storage_elfinder');
        return [
            'connector' => [
                'class' => 'alexantr\elfinder\ConnectorAction',
                'options' => [
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => $filePath,
                            'URL' => $urlPath,
                            'mimeDetect' => 'internal',
                            'imgLib' => 'gd',
                            'accessControl' => function ($attr, $path) {
                                // hide files/folders which begins with dot
                                return (strpos(basename($path), '.') === 0) ?
                                        !($attr == 'read' || $attr == 'write') :
                                        null;
                            },
                        ],
                    ],
                ],
            ],
            'input' => [
                'class' => 'alexantr\elfinder\InputFileAction',
                'connectorRoute' => 'connector',
            ],
            'ckeditor' => [
                'class' => 'alexantr\elfinder\CKEditorAction',
                'connectorRoute' => 'connector',
            ],
            'tinymce' => [
                'class' => 'alexantr\elfinder\TinyMCEAction',
                'connectorRoute' => 'connector',
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('file');
    }

}
