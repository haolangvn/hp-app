<?php

namespace hp\backend\controllers;

use common\utils\UShort;
use common\utils\UTranslate;
use common\core\Controller;

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
