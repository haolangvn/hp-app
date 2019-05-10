<?php

namespace app\widgets;

/**
 * Description of Alert
 *
 * @author Phong
 */
class Header extends \yii\base\Widget {

    public function run() {
        return $this->render('header');
//        return \hp\utils\UShort::cache()->getOrSet('HEARDER', function() {
//                    return $this->render('header');
//                }, 3600 * 24);
    }

}
