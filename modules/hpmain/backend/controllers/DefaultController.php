<?php

namespace hpmain\backend\controllers;

use hp\utils\UShort;
use hp\utils\UTranslate;
use hp\base\Controller;

/**
 * Description of DefaultController
 *
 * @author HAO
 */
class DefaultController extends Controller {

    public function actionIndex() {
        //Greeting in the admin panel :)
        /** @var User $identity */
        $identity = UShort::user()->identity;
        UShort::session()->setFlash('info', UTranslate::t('Welcome, {username}!', UTranslate::TYPE_LABEL , [
                    '{username}' => ($identity) ? $identity->username : 'No Authorise'
        ]));
        return $this->render('index');
    }

}
