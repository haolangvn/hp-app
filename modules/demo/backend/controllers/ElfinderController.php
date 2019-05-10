<?php

namespace app\modules\demo\backend\controllers;

/**
 * Description of ElfinderController
 *
 * @author HAO
 */
class ElfinderController extends \hp\base\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}
