<?php

namespace hpmain\frontend\controllers;

use hpmain\models\Store;
use hp\utils\UShort;
use yii\helpers\ArrayHelper;

class StoreController extends \luya\web\Controller {

//    public $enableCsrfValidation = false;

    public function actionIndex() {
        $totalShowroom = Store::find()->where(['is_hidden' => FALSE])->count();
        $listProvinces = Store::find()
                ->where(['is_hidden' => FALSE])
                ->select('province')
                ->orderBy('province asc')
                ->distinct('province')
                ->asArray()
                ->all();

        return $this->render('index', [
                    'totalShowroom' => $totalShowroom,
                    'listProvinces' => $listProvinces
        ]);
    }

    public function actionGetShowroom() {
        if (UShort::request()->isAjax && UShort::request()->isPost) {
            $province = UShort::request()->post('province', 0);

            $totalShowroom = Store::find()->where(['is_hidden' => FALSE])->count();

            $model = Store::find()
                    ->alias('store')
                    ->select('store.name, store.address, store.phone, system')
                    ->where([
                        'store.is_hidden' => FALSE,
                        'store.province' => $province
                    ])
                    ->asArray()
                    ->all();

            foreach ($model as $key => $data) {
                $model[$key]['system'] = $data['system'];
            }

            $data = ArrayHelper::index($model, null, 'system');

            UShort::response()->format = \yii\web\Response::FORMAT_JSON;
            if ($data) {
                return [
                    'success' => 1,
                    'data' => $data,
                ];
            }
            return ['success' => 0];
        }
//        return $this->redirect('index');
    }

}
