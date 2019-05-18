<?php

namespace hp\frontend\controllers;

use hp\models\Store;
use hp\utils\UShort;
use yii\helpers\ArrayHelper;
use hp\utils\UArray;
use Yii;

class StoreController extends \luya\web\Controller {

    //put your code here
    public function actionIndex() {
        $totalShowroom = Store::find()->where(['status' => 1])->count();
        $listProvinces = Store::find()
                ->alias('store')
                ->rightJoin('ec_location_province lp', 'lp.id = store.province')
                ->where(['store.status' => 1])
                ->select('lp.id, lp.alias, lp.name')
                ->orderBy('lp.alias asc')
                ->distinct('store.province')
                ->all();
        return $this->render('index', [
                    'totalShowroom' => $totalShowroom,
                    'listProvinces' => $listProvinces
        ]);
    }

    // phải thêm dòng này vào, nếu không khi lấy Ajax thì báo lỗi:
    // 400 bad request ("Unable to verify your data submission.") 
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionGetShowroom() {
        if (UShort::request()->isAjax && UShort::request()->isPost) {
            $id = UShort::request()->post('id', 0);

            $totalShowroom = Store::find()->where(['status' => 1])->count();

            $model = Store::find()
                    ->alias('store')
                    ->rightJoin('ec_location_province lp', 'lp.id = store.province')
                    ->select('store.name, store.address, store.phone, system')
                    ->where([
                        'store.status' => 1,
                        'store.province' => $id
                    ])
                    ->asArray()
                    ->all();
            
            foreach($model as $key => $data){
                $model[$key]['system'] = ArrayHelper::getValue(UArray::system(), $data['system']);
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
        return $this->redirect('index');
    }

}
