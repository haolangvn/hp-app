<?php

namespace app\modules\ecommerce\backend\controllers;

use Yii;
use hp\base\Controller;
use app\modules\ecommerce\models\OrderDetail;
use hp\utils\UShort;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use app\modules\ecommerce\models\PromotionSap;

/**
 * OrderDetailController implements the CRUD actions for Order model.
 */
class OrderDetailController extends Controller {

    public function actionGetPromotionById() {

        if (UShort::request()->isPost && UShort::request()->isAjax) {
            $id = UShort::request()->post('id', 0);
            $model = OrderDetail::findOne($id);
            if ($model) {
                $arr = explode(",", $model->promotion_code);
                UShort::response()->format = \yii\web\Response::FORMAT_JSON;
                return $arr;
            }
            return 0;
        }
        $this->redirect(['order/index']);
    }

    public function actionUpdatePromotionById() {

        if (UShort::request()->isPost && UShort::request()->isAjax) {
            $id = UShort::request()->post('id', 0);
            $code = UShort::request()->post('code');
            $model = OrderDetail::findOne($id);
            $listCode = explode(",", $code);
            UShort::response()->format = \yii\web\Response::FORMAT_JSON;
            if ($model && $code != "" && $listCode) {
                $model->promotion_code = $code;

                $i = 1;
                $name = [];
                foreach ($listCode as $code) {
                    $rs = PromotionSap::find()
                                    ->select('type,name')
                                    ->where([
                                        'code' => $code,
                                    ])->one();
                    if ($rs) {
                        if ($i == 1) {
                            $proSapType = $rs->type;
                        } else {
                            if ($proSapType !== $rs->type)
                                return 0;
                        }
                        $name[] = $rs->name;
                        $i++;
                    }
                }
                $model->promotion_type = $proSapType;
                $model->description = "";
                if ($model->save(false)) {
                    return $name;
                }
            }
            return 0;
        }
        $this->redirect(['order/index']);
    }
    
    public function actionUpdateDescriptionById() {
        if (UShort::request()->isPost && UShort::request()->isAjax) {
            $id = UShort::request()->post('id', 0);
            $description = trim(UShort::request()->post('description'));
            $model = OrderDetail::findOne($id);
            if($model && $description != ""){
                $model->description = $description;
                $model->promotion_code = "";
                $model->promotion_type = 0;
                if ($model->save(false)) {
                    return 1;
                }
            }
            return 0;
        }
        $this->redirect(['order/index']);
    }

}
