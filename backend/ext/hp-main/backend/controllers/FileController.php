<?php

namespace hp\backend\controllers;

//use alexantr\elfinder\ConnectorAction;
use Yii;
use common\utils\UShort;

class FileController extends \common\core\Controller {

    /**
     * @return array
     */
    public function actions() {
        $url = UShort::app()->urlManagerFrontend->baseUrl . '/storage/';
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => $url, // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => true, // For any kind of files uploading.
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetFilesAction',
                'url' => $url, // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => $url, // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false, // For any kind of files uploading.
            ],
            'file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => $url, // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
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
