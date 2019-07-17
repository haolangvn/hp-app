<?php

namespace hpmain\backend\controllers;

use Yii;
use luya\admin\models\Tag;
use luya\admin\models\TagRelation;
use yii\web\NotFoundHttpException;
use hp\base\Controller;
use hp\utils\UShort;
use hpnews\models\Article;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller {

    /**
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex($pk_id, $table_name, $class) {

        $tag = new Tag();

        // link article to tag
        if (UShort::request()->post('tag_id', null)) {
            UShort::response()->format = \yii\web\Response::FORMAT_JSON;
            $tag_id = UShort::request()->post('tag_id');
            $params = [
                'tag_id' => $tag_id,
                'table_name' => $table_name,
                'pk_id' => $pk_id,
            ];

            $relation = TagRelation::find()->where($params)->one();
            if ($relation) {
                UShort::db()->createCommand('DELETE FROM ' . TagRelation::tableName() . ' WHERE tag_id=:tag_id AND table_name=:table_name AND pk_id=:pk_id')
                        ->bindValue(':tag_id', $tag_id)
                        ->bindValue(':table_name', $table_name)
                        ->bindValue('pk_id', $pk_id)
                        ->execute();
                return ['msg' => 'Unlink Record'];
            } else {
                UShort::db()->createCommand()->insert(TagRelation::tableName(), $params)->execute();
                return ['msg' => 'Link Record'];
            }
        }

        // create new tag
        if ($tag->load(Yii::$app->request->post()) && $tag->save()) {
            return $this->refresh();
        }

        $article = null;
        if (class_exists($class)) {
            $object = new $class();
            $article = $object::findOne($pk_id);
        }

        if (!$article) {
            return 'Not Found';
        }

        return $this->renderAjax('index', [
                    'data' => Tag::find()->all(),
                    'model' => $tag,
                    'tags' => [],
                    'tags' => $article->tags
        ]);
    }

//    /**
//     * Displays a single Tag model.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionView($id) {
//        return $this->render('view', [
//                    'model' => $this->findModel($id),
//        ]);
//    }
//
//
//    /**
//     * Updates an existing Tag model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id) {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//                    'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing Tag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
