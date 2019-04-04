<?php

namespace common\core;

use common\utils\UShort;

/**
 * Description of ActiveRecord
 *
 * @author HAO
 */
class ActiveRecord extends \yii\db\ActiveRecord {

    public function save($runValidation = true, $attributeNames = null) {
        $time = time();

        if ($this->isNewRecord) {
            if ($this->hasAttribute('created_at')) {
                $this->created_at = $time;
            }
            if ($this->hasAttribute('created_by')) {
                $this->created_by = UShort::user()->id;
            }
        } else {
            if ($this->hasAttribute('updated_at')) {
                $this->updated_at = $time;
            }
            if ($this->hasAttribute('created_by')) {
                $this->updated_by = UShort::user()->id;
            }
        }

        return parent::save($runValidation, $attributeNames);
    }

}
