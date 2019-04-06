<?php

namespace app\modules\demo\backend\controllers;

/**
 * Description of DefaultController
 *
 * @author HAO
 */
class DefaultController extends \common\core\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}
