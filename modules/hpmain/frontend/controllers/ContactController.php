<?php

namespace hpmain\frontend\controllers;

use hpmain\models\base\Contact;
use hp\utils\UShort;
use hp\utils\UTranslate;

class ContactController extends \hp\base\Controller {

    public function actionIndex() {
        $model = new Contact();
        if ($model->load(UShort::request()->post()) && $model->save()) {
            UShort::setFlash(UTranslate::t('Content was send!'));
            return $this->refresh();
        }

        return $this->render('index', ['model' => $model]);
    }

}
