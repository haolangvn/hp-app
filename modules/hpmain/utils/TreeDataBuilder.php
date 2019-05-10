<?php

namespace hp\utils;

use Yii;

/**
 * Description of Object
 *
 * @author HAO
 */
class TreeDataBuilder extends \yii\base\BaseObject {

    public $varID = 'id';
    public $varParent = 'parent_id';
    public $varLabel = 'name';
    //
    public $object = null;
    public $data = null;

    public static function contruct($object, $config = []) {
        $model = new TreeDataBuilder($config);

        if (is_string($object) && class_exists($object)) {
            $obj = Yii::createObject($object);
            $object = $obj->find()->where([$model->varParent => 0]);
        }

        if ($object instanceof \yii\db\ActiveQuery) {
            $model->object = $object;
        } else {
            throw new \Exception("Class {$object} does not exits");
        }

        $data = $object->all();
        $tree = [];
        foreach ($data as $node) {
            $model->processTree($tree, $node, 0);
        }
        $model->data = $tree;

        return $model;
    }

    protected function processTree(&$tree, $node, $level = 0) {
        $node->{$this->varLabel} = str_repeat('-----', $level) . $node->{$this->varLabel};
        array_push($tree, $node);
        $data = $this->object
                ->where([$this->varParent => $node->{$this->varID}])
                ->all();
        if ($data) {
            foreach ($data as $n) {
                self::processTree($tree, $n, $level + 1);
            }
        }
    }

    public function getTree() {
        return $this->data;
    }

    public function getList($eliminateId = null) {
        $list = [];
        if ($this->data) {
            foreach ($this->data as $node) {
                if (!$eliminateId || ($node->{$this->varID} != $eliminateId && $node->{$this->varParent} != $eliminateId)) {
                    $list[$node->{$this->varID}] = $node->{$this->varLabel};
                }
            }
        }
        return $list;
    }

}
