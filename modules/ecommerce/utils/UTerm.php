<?php

namespace app\modules\ecommerce\utils;

use app\modules\ecommerce\models\Vocabulary;
use app\modules\ecommerce\models\Term;
//use yii\helpers\ArrayHelper;
use luya\helpers\ArrayHelper;

/**
 * Description of Term
 *
 * @author HAO
 */
class UTerm {

    public static function getAll() {
        return ArrayHelper::index(Term::find()->alias('t')
                        ->innerJoin(Vocabulary::tableName() . ' v', 'v.id = t.vid')
                        ->select('t.id value, t.name label, v.alias')->asArray()
                        ->all(), null, 'alias');
    }

}
