<?php

namespace app\widgets;

use hp\utils\UShort;
use luya\cms\models\Nav;

/**
 * Description of Footer
 *
 * @author HAO
 */
class Footer extends \yii\base\Widget {

    public function run() {
        $key[] = 'FOOTER';
        $key[] = UShort::db()
                ->createCommand('SELECT count(id) count FROM ' . Nav::tableName() . ' WHERE nav_container_id=4 && is_hidden=false')
                ->queryOne();
        return UShort::cache()->getOrSet($key, function() {
                    return $this->render('footer');
                }, 0);
    }

}
