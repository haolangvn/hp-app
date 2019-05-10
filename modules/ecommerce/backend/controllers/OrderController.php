<?php

namespace app\modules\ecommerce\backend\controllers;

use Yii;
use app\modules\ecommerce\models\Order;
use app\modules\ecommerce\models\search\Order as OrderSearch;
use hp\base\Controller;
use yii\web\NotFoundHttpException;
use app\modules\ecommerce\models\OrderCustomer;
use app\modules\ecommerce\models\OrderDetail;
use app\modules\ecommerce\models\OrderShipment;
use app\modules\ecommerce\models\OrderVat;
use hp\utils\UShort;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use app\modules\ecommerce\models\PromotionSap;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller {

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionViewNew($id) {
        $model = $this->findModel($id);

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        if ($model) {
            $modelCustomer = OrderCustomer::findOne(['oid' => $id]);
            $modelVat = OrderVat::findOne(['oid' => $id]);
            $modelShipment = OrderShipment::findOne(['oid' => $id]);

            if (UShort::request()->post('hasEditable')) {
                $transaction = UShort::db()->beginTransaction();
                $params = UShort::request()->post();
                foreach ($params as $param => $value) {
                    try {
                        if ($model->hasAttribute($param)) {
                            $model->$param = $value;
                            if ($param === 'discount_per') {
                                $kq = $model->total * (100 - $value) / 100;
                                if (($kq % 1000) > 0) {
                                    $kq = $kq - ($kq % 1000) + 1000;
                                }
                                $model->discount = $model->total - $kq;
                            }

                            if ($param === 'discount') {
                                $kq = $model->discount * 100 / $model->total;
                                $model->discount_per = round($kq,4);
                            }

                            if ($model->validate()) {
                                if ($model->save() && $model->updateCost()) {
                                    $transaction->commit();
                                    return true;
                                }
                                throw new \yii\base\Exception(Json::encode($model->getErrors()));
                            } else {
                                throw new \yii\base\Exception(Json::encode($model->getErrors()));
                            }
                        }

                        /** Update Property for order-customer */
                        if (strpos($param, 'Customer-') === 0) {
                            $attribute = explode('Customer-', $param);
                            $param = ArrayHelper::getValue($attribute, '1');
                            if ($modelCustomer->hasAttribute($param)) {
                                $modelCustomer->$param = $value;
                                if ($modelCustomer->validate([$param])) {
                                    if ($modelCustomer->save(false, [$param])) {
                                        $transaction->commit();
                                        return true;
                                    }
                                    throw new \yii\base\Exception(Json::encode($model->getErrors()));
                                }
                                throw new \yii\base\Exception(Json::encode($modelCustomer->getErrors()));
                            }
                            return 0;
                        }

                        /** Update Property for order-vat */
                        if (strpos($param, 'Vat-') === 0) {
                            $attribute = explode('Vat-', $param);
                            $param = ArrayHelper::getValue($attribute, '1');
                            if (!$modelVat) {
                                $modelVat = new OrderVat();
                                $modelVat->setAttribute("oid", $id);
                            }
                            if ($modelVat->hasAttribute($param)) {
                                $modelVat->setAttribute($param, $value);
                                if ($modelVat->validate()) {
                                    if ($modelVat->save()) {
                                        $transaction->commit();
                                        return true;
                                    }
                                    throw new \yii\base\Exception(Json::encode($model->getErrors()));
                                } else {
                                    throw new \yii\base\Exception(Json::encode($modelVat->getErrors()));
                                }
                            }
                            return 0;
                        }

                        /** Update Property for order-shippment */
                        if (strpos($param, 'Shipment-') === 0) {
                            $attribute = explode('Shipment-', $param);
                            $param = ArrayHelper::getValue($attribute, '1');
                            if (!$modelShipment) {
                                $modelShipment = new OrderShipment();
                                $modelShipment->setAttribute("oid", $id);
                            }
                            if ($modelShipment->hasAttribute($param)) {
                                $modelShipment->setAttribute($param, $value);
                                if ($modelShipment->validate()) {
                                    if ($modelShipment->save()) {
                                        $transaction->commit();
                                        return true;
                                    }
                                    throw new \yii\base\Exception(Json::encode($model->getErrors()));
                                } else {
                                    throw new \yii\base\Exception(Json::encode($modelShipment->getErrors()));
                                }
                            }
                            return 0;
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                        return $e->getMessage();
                    } catch (\yii\db\Exception $e) {
                        $transaction->rollBack();
                        return $e->getMessage();
                    }
                }
            }
            $promotionSapHeader = PromotionSap::find()->where('status = 1 and so_header = 1')->orderBy('sort_order asc')->all();
            $promotionSapLines = PromotionSap::find()->where('status = 1 and so_lines = 1')->orderBy('sort_order asc')->all();
            return $this->render('view-new', [
                        'model' => $model,
                        'modelCustomer' => $modelCustomer,
                        'promotionSapHeader' => $promotionSapHeader,
                        'promotionSapLines' => $promotionSapLines,
            ]);
        }
        // khi không model 
        return $this->redirect(['index']);
    }

    public function actionEditableDetail($id) {
        if (($model = OrderDetail::findOne($id)) !== null) {
            UShort::response()->format = \yii\web\Response::FORMAT_JSON;
//            return \hp\utils\UArray::dump($model);
            if (UShort::request()->isAjax && UShort::request()->isPost) {
                $transaction = UShort::db()->beginTransaction();
                $params = UShort::request()->post();
                if (UShort::request()->post('hasEditable')) {
                    $params = UShort::request()->post();
                    foreach ($params as $param => $value) {
                        try {
                            if (strpos($param, 'Detail-') === 0) {
                                $attribute = explode('Detail-', $param);
                                $param = ArrayHelper::getValue($attribute, '1');
                                if ($model->hasAttribute($param)) {
                                    $model->setAttribute($param, $value);
                                    if ($param === 'discount_per') {
                                        $kq = $model->price * (100 - $value) / 100;
                                        if (($kq % 1000) > 0) {
                                            $kq = $kq - ($kq % 1000) + 1000;
                                        }
                                        $model->discount = ($model->price - $kq) * $model->quantity;
                                    }

                                    if ($param === 'quantity') {
                                        $kq = $model->price * (100 - $model->discount_per) / 100;
                                        if (($kq % 1000) > 0) {
                                            $kq = $kq - ($kq % 1000) + 1000;
                                        }
                                        $model->discount = ($model->price - $kq) * $model->quantity;
                                    }

                                    if ($param === 'discount') {
                                        $kq = $model->discount / $model->quantity;
                                        $kq = $kq * 100 / $model->price;
                                        $model->discount_per = $kq;
                                    }

                                    $model->total = $model->price * $model->quantity;
                                    $model->cost = ($model->price * $model->quantity) - $model->discount;

//                                    if ($model->validate([$param]) && $model->save(false, [$param, 'discount_per', 'discount', 'total', 'cost'])) {
                                    if ($model->validate() && $model->save()) {
                                        $modelOrder = Order::findOne($model->oid);
                                        if ($modelOrder) {
                                            if ($modelOrder->updateTotal() && $modelOrder->updateCost()) {
                                                $transaction->commit();
                                                return ['success' => 1, 'msg' => "Update {{$param}} successfull"];
                                            }
                                        }
                                        $transaction->rollBack();
                                        return false;
                                    } else {
                                        throw new \yii\base\Exception($model->getErrorsAsString(), 500);
                                    }
                                }
                            }
                        } catch (Exception $e) {
                            $transaction->rollBack();
                            return $e->getMessage();
                        } catch (\yii\db\Exception $e) {
                            $transaction->rollBack();
                            return $e->getMessage();
                        }
                    }
                }
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGetPromotionById() {

        if (UShort::request()->isPost && UShort::request()->isAjax) {
            $id = UShort::request()->post('id', 0);
            $model = Order::findOne($id);
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
            $model = Order::findOne($id);
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
            $model = Order::findOne($id);
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
