<?php

namespace app\modules\ecommerce\frontend\controllers;

use app\modules\ecommerce\models\search\ItemSearch;
use hp\utils\UShort;

/**
 * Description of DefaultController
 *
 * @author HAO
 */
class DefaultController extends \luya\web\Controller {

    public function actionIndex() {
        $params = UShort::request()->queryParams;
        return $this->render('index', [
                    'productList' => ItemSearch::search($params),
                    'params' => $params
        ]);
    }

    public function actionItemDetail($brand, $id, $alias) {
        \hp\utils\UArray::dump(\hp\utils\UShort::request()->get());
    }

    public function actionTest() {
        echo 'OK';
    }

}
