<?php

namespace hpmain\frontend\controllers;

/**
 * Description of ClsController
 *
 * @author HAO
 */
class CacheController extends \luya\web\Controller {

    public function actionFlush() {
        \hp\utils\UShort::cache()->flush();
        return $this->goHome();
    }

}
