<?php

namespace hp\frontend\controllers;

use hp\models\Contact;
use hp\utils\UShort;
use Yii;

class ContactController extends \luya\web\Controller {

    //put your code here
    public function actionIndex() {
        $model = new Contact();
        if ($model->load(UShort::request()->post())/* && $model->save() */) {
            UShort::setFlash(Yii::t('app', 'Content was send!'));
            return $this->redirect(['index']);
        }

        return $this->renderPartial('index', ['model' => $model]);
//        UShort::setParams('content', $this->renderPartial('index', ['model' => $model]));
//        return $this->renderContent('');
    }

}
