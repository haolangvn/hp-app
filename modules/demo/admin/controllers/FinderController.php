<?php

namespace app\modules\demo\admin\controllers;

use Yii;
use luya\admin\base\Controller;

class FinderController extends Controller {

    // disables the route based permissions checks
    public $disablePermissionCheck = true;
    // let the controller know that actionData returns data in API Format (json).
    public $apiResponseActions = ['data'];

    // The view file to rendern when entering this controller
    public function actionIndex() {
        return $this->render('index');
    }

    // the api to send and retrieve data
    public function actionData() {
        return time();
    }

}
