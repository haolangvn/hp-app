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

    public function addCompareToQuery(&$query, $column, $value, $operator = 'AND') {
        if ($value == '') {
            return;
        }
        if (preg_match('/^(?:\s*(<>|<=|>=|<|>|=))?(.*)$/', $value, $matches)) {
            $value = $matches[2];
            $op = $matches[1];
        }
        $func = 'andFilterWhere';
        if ($operator === 'OR') {
            $func = 'orFilterWhere';
        }
        if ($op == '') {
            $query->$func(['like', $column, $value]);
        } else {
            $query->$func([$op, $column, $value]);
        }
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
