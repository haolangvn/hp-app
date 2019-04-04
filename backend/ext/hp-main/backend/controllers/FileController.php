<?php

namespace hp\backend\controllers;

use alexantr\elfinder\ConnectorAction;
use Yii;

class FileController extends \common\core\Controller {

    /**
     * @return array
     */
    public function actions() {
        return [
            'connector' => [
                'class' => ConnectorAction::class,
                'options' => [
                    'disabledCommands' => ['netmount'],
                    'connectOptions' => [
                        'filter'
                    ],
                    'roots' => [
                        [
                            'driver' => 'LocalFileSystem',
                            'path' => Yii::getAlias('@storage'),
                            'URL' => Yii::$app->urlManagerFrontend->baseUrl . '/storage/',
                            'uploadDeny' => [
                                'text/x-php', 'text/php', 'application/x-php', 'application/php'
                            ],
                        ],
                    ],
                ],
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetFilesAction',
                'url' => Yii::getAlias('@web') . '/storage', // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '@web/storage', // Directory URL address, where files are stored.
                'path' => Yii::getAlias('@storage'), // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false, // For any kind of files uploading.
            ],
            'file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => '@web/storage', // Directory URL address, where files are stored.
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
