<?php

namespace hp\traits;

/**
 *
 * @author Hao Lang
 */
trait LogTrait {

    public function getLog() {
        $query = new \yii\db\Query();
        $query->from(\hp\base\NgRestLog::tableName());
        $query->where(['table_name' => self::tableName(), 'pk_value' => implode("-", $this->getPrimaryKey(true))]);

        return $query;
    }

}
