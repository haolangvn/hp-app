<?php

namespace hpmain\backend\controllers;

/**
 * Description of Error
 *
 * @author HAO
 */
class ErrorController extends \yii\web\Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action) {
        if ($action->id == 'error')
            $this->layout = '//error.php';

        return parent::beforeAction($action);
    }

}
