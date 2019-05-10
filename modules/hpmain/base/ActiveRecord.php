<?php

namespace hp\base;

use hp\behaviors\TimestampBehavior;
use hp\behaviors\BlameableBehavior;

/**
 * Description of ActiveRecord
 *
 * @author HAO
 */
class ActiveRecord extends \yii\db\ActiveRecord {

    public function behaviors() {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }

    public function save($runValidation = true, $attributeNames = null) {
        return parent::save($runValidation, $attributeNames);
    }

}
