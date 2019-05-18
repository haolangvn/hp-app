<?php

namespace hp\backend\controllers;

use Yii;
use hp\utils\UShort;

class FileController extends \hp\base\Controller {

    /**
     * @return array
     */
    public function actions() {
        $url = UShort::app()->urlManagerFrontend->baseUrl . '/storage2/';
        $filePath = Yii::getAlias('@storage2');
        return [
//            'files-get' => [
//                'class' => 'vova07\imperavi\actions\GetFilesAction',
//                'url' => $url, // Directory URL address, where files are stored.
//                'path' => $filePath, // Or absolute path to directory where files are stored.
//            ],
//            
//            'image-upload' => [
//                'class' => 'vova07\imperavi\actions\UploadFileAction',
//                'url' => $url, // Directory URL address, where files are stored.
//                'path' => $filePath, // Or absolute path to directory where files are stored.
//                'uploadOnlyImage' => true, // For any kind of files uploading.
//            ],
//            
//            'file-upload' => [
//                'class' => 'vova07\imperavi\actions\UploadFileAction',
//                'url' => $url, // Directory URL address, where files are stored.
//                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
//                'uploadOnlyImage' => false, // For any kind of files uploading.
//            ],
//            'file-delete' => [
//                'class' => 'vova07\imperavi\actions\DeleteFileAction',
//                'url' => $url, // Directory URL address, where files are stored.
//                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
//            ],
            // Elfinder
            'connector' => [
                'class' => \alexantr\elfinder\ConnectorAction::className(),
                'options' => [
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => $filePath,
                            'URL' => $url,
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
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('file');
    }

}
