<?php

namespace common\core;

use luya\admin\ngrest\base\NgRestEventBehavior;
use luya\admin\behaviors\LogBehavior;
use common\behaviors\TimestampBehavior;
use common\behaviors\BlameableBehavior;

/**
 * Description of NgRestModel
 *
 * @author HAO
 */
abstract class NgRestModel extends \luya\admin\ngrest\base\NgRestModel {

    public function behaviors() {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            'NgRestEventBehvaior' => [
                'class' => NgRestEventBehavior::className(),
                'plugins' => $this->getNgRestConfig()->getPlugins(),
            ],
            'LogBehavior' => [
                'class' => LogBehavior::className(),
                'api' => static::ngRestApiEndpoint(),
            ],
        ];
    }

}
