<?php

namespace hp\backend\controllers;

use Yii;
use hp\models\Translate;
use hp\models\search\Translate as TranslateSearch;
use common\core\Controller;
use hp\models\Language;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * TranslateController implements the CRUD actions for Translate model.
 */
class TranslateController extends Controller {

    /**
     * Lists all Translate models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TranslateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Translate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Translate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Translate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $language = ArrayHelper::map(Language::find()->where(['not like', 'code', 'en'])->all(), 'code', 'name');
        return $this->render('create', [
                    'model' => $model,
                    'language' => $language
        ]);
    }

    /**
     * Updates an existing Translate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $language = ArrayHelper::map(Language::find()->where(['not like', 'code', 'en'])->all(), 'code', 'name');
        return $this->render('update', [
                    'model' => $model,
                    'language' => $language
        ]);
    }

    /**
     * Deletes an existing Translate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Translate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Translate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Translate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
