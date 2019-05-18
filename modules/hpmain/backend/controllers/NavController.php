<?php

namespace hp\backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use hp\models\NavItem;
use hp\models\Search\NavItemSearch;
use yii\web\NotFoundHttpException;
use hp\base\Controller;
use hp\utils\UShort;

/**
 * NavController implements the CRUD actions for NavItem model.
 */
class NavController extends Controller {

    /**
     * Lists all NavItem models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NavItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NavItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NavItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new NavItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing NavItem model.
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
                    'blocks' => [],
                    'page' => null
        ]);
    }

    public function actionUpdateContent($id, $page) {
        $blocks = [];
        $model = $this->findModel($id);

        if ($page) {
            $blocks = $model->getBlocks();

            $transaction = UShort::app()->db->beginTransaction();
            try {
                if (Yii::$app->request->isPost) {
                    foreach ($blocks as $key => $node) {
                        $json = Json::encode(ArrayHelper::getValue(Yii::$app->request->post(), ['NavItemBlock', $key], []));
                        $node->json_config_values = $json;
//                        \hp\utils\UArray::dump($json);
                        if (!$node->update()) {
                            throw new \Exception(Json::encode($node->getErrors()));
                        }
                    }

                    $transaction->commit();
                    UShort::setFlash('Item has been updated.');
                    return $this->refresh();
                }
            } catch (Exception $ex) {
                $transaction->rollback();
                UShort::setFlash($ex->getMessage(), 'danger');
            }
        }

        return $this->render('update', [
                    'model' => $model,
                    'blocks' => $blocks,
                    'page' => $page
        ]);
    }

    /**
     * Deletes an existing NavItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the NavItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NavItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = NavItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
