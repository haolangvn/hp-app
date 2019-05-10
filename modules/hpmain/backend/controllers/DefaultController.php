<?php

namespace hp\backend\controllers;

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
        UShort::session()->setFlash('info', UTranslate::t('label', 'Welcome, {username}!', [
                    '{username}' => ($identity) ? $identity->username : 'No Authorise'
        ]));
        return $this->render('index');
    }

}
