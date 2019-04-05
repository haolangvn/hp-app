<?php

namespace app\modules\demo\frontend\controllers;

/**
 * Description of ClearController
 *
 * @author HAO
 */
class ClearController extends \luya\web\Controller {

    public function actionIndex() {
        \common\utils\UShort::cache()->flush();
        $this->goHome();
    }

}
