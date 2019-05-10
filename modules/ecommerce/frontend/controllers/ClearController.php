<?php

namespace app\modules\ecommerce\frontend\controllers;

/**
 * Description of CacheController
 *
 * @author HAO
 */
class ClearController extends \luya\web\Controller {

    public function actionCache() {
        \hp\utils\UShort::cache()->flush();

        $this->goHome();
    }

}
