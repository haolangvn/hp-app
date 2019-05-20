<?php

namespace app\widgets;

use luya\cms\models\Nav;
use hp\utils\UShort;

/**
 * Description of Alert
 *
 * @author Phong
 */
class Header extends \yii\base\Widget {

    public function run() {
        $key[] = 'HEADER';
        $key[] = UShort::db()
                ->createCommand('SELECT count(id) count FROM ' . Nav::tableName() . ' WHERE nav_container_id in (1, 2, 3) AND is_hidden=false')
                ->queryOne();

        return UShort::cache()->getOrSet($key, function() {
                    return $this->render('header');
                }, 0);
    }

}
