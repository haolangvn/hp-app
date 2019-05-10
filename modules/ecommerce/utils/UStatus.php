<?php

namespace app\modules\ecommerce\utils;

use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Description of UStatus
 *
 * @author phong
 */
class UStatus {
    public static $shipping = "shipping";
    //put your code here
    public static function getAllShippingStatus() {
        return ArrayHelper::map((new Query())->from('{{%ec_order_status}}')
                                ->filterWhere(['type' => self::$shipping])
                                ->select('id, value')
                                ->all(), 'id', 'value');
    }
    
    public static function getObject($id) {
        $rs = (new Query())->from('{{%ec_order_status}}')
                                ->where(['id' => $id])
                                ->one();
        if($rs) 
            return $rs;
        return false;
    }
}
