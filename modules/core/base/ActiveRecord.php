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

    public function addCompareTimeToQuery(&$query, $column, $value, $operator = 'AND') {
        if ($value == '') {
            return;
        }
        $format = '%d/%m/%Y';

        if (preg_match('/^(?:\s*(<>|<=|>=|<|>|=))?(.*)$/', $value, $matches)) {
            $value = $matches[2];
            $op = $matches[1];
        }
        $func = 'andFilterWhere';
        if ($operator === 'OR') {
            $func = 'orFilterWhere';
        }
        if ($op == '') {
            $query->$func(['like', "FROM_UNIXTIME($column, '{$format}')", $value]);
        } else {
            $query->$func([$op, "FROM_UNIXTIME($column, '{$format}')", $value]);
        }
    }

    /**
     * Get Error as string
     * @param type $attribute
     * @return string
     */
    public function getErrorsAsString($attribute = null) {
        $msg = [];
        $errors = parent::getErrors($attribute);

        foreach ($errors as $key => $node) {
            foreach ($node as $value) {
                $msg[] = $value;
            }
        }
        return implode('<br/>', $msg);
    }

}
