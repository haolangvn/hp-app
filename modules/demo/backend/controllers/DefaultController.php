<?php

namespace app\modules\demo\backend\controllers;

/**
 * Description of DefaultController
 *
 * @author HAO
 */
class DefaultController extends \hp\base\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}
