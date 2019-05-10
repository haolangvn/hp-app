<?php

namespace app\modules\ecommerce\frontend\controllers;

use app\modules\ecommerce\models\search\ItemSearch;
use hp\utils\UShort;

class ApiController extends \hp\base\Controller {

    public function init() {
        parent::init();
        $_GET['sort'] = UShort::request()->post('sort', '');
        $_GET['page'] = UShort::request()->post('page', 1);

        if (isset($_POST['sort'])) {
            unset($_POST['sort']);
        }
        if (isset($_POST['page'])) {
            unset($_POST['page']);
        }

        $this->enableCsrfValidation = FALSE;
    }

    public function actionProduct() {

        if (UShort::request()->isPost) {
            $productList = ItemSearch::search(UShort::request()->post());
            $currentPage = UShort::request()->get('page', 1);


            if ($currentPage > $productList->getPage()->pageCount) {
                throw new \Exception('Request forbidden by administrative rules.', 403);
            }

            echo $this->renderPartial('/blocks/_items', [
                'items' => $productList->getItems()
            ]);
            echo $this->renderPartial('/blocks/_page', [
                'page' => $productList->getPage()
            ]);
        }
        
//        throw new \Exception('Request forbidden by administrative rules.', 403);
    }

}
