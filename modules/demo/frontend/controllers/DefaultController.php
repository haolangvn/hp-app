<?php

namespace app\modules\demo\frontend\controllers;

/**
 * Description of DefaultController
 *
 * @author HAO
 */
class DefaultController extends \luya\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}
