<?php

namespace hpmain\cache;

use hp\utils\UShort;

/**
 * Description of HttpCache
 *
 * @author HAO
 */
class HttpCache extends \yii\filters\HttpCache {

    public function init() {
        parent::init();
        $count = count(UShort::app()->menu->getLanguageContainer(UShort::app()->composition->langShortCode));
        $this->etagSeed;
    }

    public function beforeAction($action) {

        return parent::beforeAction($action);
    }

}
