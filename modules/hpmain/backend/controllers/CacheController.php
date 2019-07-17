<?php

namespace hpmain\backend\controllers;

/**
 * Description of CacheController
 *
 * @author HAO
 */
class CacheController extends \yii\web\Controller {

    public function actionFlush() {
        \hp\utils\UShort::cache()->flush();
        return $this->goHome();
    }

}
