<?php

namespace app\modules\ecommerce\admin\apis;

use hp\utils\TreeDataBuilder;
use hp\utils\TreeListAction;

/**
 * Group Controller.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 */
class GroupController extends \luya\admin\ngrest\base\Api {

    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\ecommerce\models\Group';

    public function actions() {

        $actions = parent::actions();
//        $actions['index']['class'] = TreeListAction::class;
//        $actions['list']['data'] = TreeDataBuilder::contruct($this->modelClass)->getTree();
        $actions['list']['class'] = TreeListAction::class;
        $actions['list']['data'] = TreeDataBuilder::contruct($this->modelClass)->getTree();
        return $actions;
    }

}
