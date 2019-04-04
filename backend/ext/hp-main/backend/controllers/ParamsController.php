<?php

namespace hp\backend\controllers;

use Yii;
use hp\models\Setting;
use hp\models\search\Setting as SettingSearch;
use common\core\Controller;
use yii\web\NotFoundHttpException;
use common\utils\UShort;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * ParamsController implements the CRUD actions for Setting model.
 */
class ParamsController extends Controller {

    /**
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/setting/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setting model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('/setting/view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Setting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Setting();

        if (UShort::request()->isPost && $model->load(UShort::request()->post())) {
            if ($model->type == 'json') {
                $content = array();
                $type = UShort::request()->post('Type', []);
                $hint = UShort::request()->post('Hint', []);
                $range = UShort::request()->post('Range', []);
                $keys = UShort::request()->post('Key', []);
                foreach ($keys as $k => $key) {
                    if ($key != '') {
                        $content[$key] = [
                            'value' => '',
                            'type' => ArrayHelper::getValue($type, $k),
                            'range' => ArrayHelper::getValue($range, $k),
                            'hint' => ArrayHelper::getValue($hint, $k)
                        ];
                    }
                }
                $model->value = \yii\helpers\Json::encode($content);
            }
            if ($model->save()) {
                UShort::setFlash('Params has been created.');
            }
            return $this->redirect(['create']);
        }

        if ($model->load(Yii::$app->request->get()) && $model->validate(['id'])) {
            return $this->render('/setting/form2', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('/setting/form1', [
                        'model' => $model->loadDefaultValues(),
            ]);
        }
    }

    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if ($id === 'banner') {
            return $this->banner();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->type == 'json') {
                $content = isset($_POST['Content']) ? $_POST['Content'] : [];
                $model->value = Json::encode($content);
            }

            $transaction = UShort::app()->db->beginTransaction();
            try {
                if (!$model->save()) {
                    throw new Exception('Setting cannot be saved.');
                }
                $transaction->commit();
                UShort::setFlash('Params has been updated.');
            } catch (Exception $ex) {
                $transaction->rollback();
                UShort::setFlash($ex->getMessage(), 'danger');
            }
            return $this->refresh();
        } else {
            $setting = \Yii::getAlias('@backend') . '/views/setting/' . $model->id . '.php';

            return $this->render(file_exists($setting) ? $model->id : '/setting/form2', [
                        'model' => $model,
            ]);
        }
    }

    public function banner($id = 'banner') {
        $model = $this->findModel($id);
        if (isset($_POST['Image'])) {
            $images = UShort::request()->post('Image');
            $links = UShort::request()->post('Link');

            if (is_array($images)) {
                foreach ($images as $k => $image) {
                    if ($image != '') {
                        $banners[] = ['image' => $image, 'link' => $links[$k]];
                    }
                }
            }
            $model->value = Json::encode($banners);
            if ($model->save()) {
                UShort::setFlash('Setting has been updated.');
                return $this->refresh();
            }
        }
        $banners = Json::decode($model->value);
        return $this->render('/help/banner', [
                    'model' => $model,
                    'banners' => $banners,
                    'num' => UShort::request()->get('num', count($banners))
        ]);
    }

    /**
     * Deletes an existing Setting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
