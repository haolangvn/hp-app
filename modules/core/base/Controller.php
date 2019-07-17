<?php

namespace hp\base;

use hp\utils\UConfig;
use hp\utils\UShort;

/**
 * Description of Controller
 *
 * @author HAO
 */
class Controller extends \luya\web\Controller {

    public function init() {
        parent::init();
        UConfig::init();
        if (!UShort::app()->has('adminuser') || UShort::app()->adminuser->getIdentity()) {
            
        }
        UShort::app()->adminuser->getIdentity();
    }

}
