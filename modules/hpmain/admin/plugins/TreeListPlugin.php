<?php

namespace hp\admin\plugins;

use luya\admin\helpers\Angular;
use luya\admin\ngrest\base\Plugin;
use hp\utils\TreeDataBuilder;

/**
 * Description of GroupPlugin
 *
 * @author HAO
 */
class TreeListPlugin extends Plugin {

    public $modelClass = null;
    public $where = [];

    public function renderList($id, $ngModel) {
        return $this->createListTag($ngModel);
    }

    public function renderUpdate($id, $ngModel) {
        return Angular::select($ngModel, $this->alias, $this->getData());
    }

    public function renderCreate($id, $ngModel) {
        return Angular::select($ngModel, $this->alias, $this->getData());
    }

    private function getData($exclude = null) {
        if ($this->modelClass) {
            return TreeDataBuilder::contruct($this->modelClass)->getList($exclude);
        }
        return [];
    }

}
