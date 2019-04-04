<?php

namespace hp\backend\controllers;

/**
 * Description of ImageController
 *
 * @author HAO
 */
class ImageController extends \luya\web\Controller {

    public function actions() {
        return [
            'images-get' => [
                'class' => \vova07\imperavi\actions\GetImagesAction::class,
                'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
                'path' => '@upload', // Or absolute path to directory where files are stored.
                'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
            ],
        ];
    }

}
