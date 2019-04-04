<?php

namespace app\modules\demo\admin\apis;

/**
 * Demo Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class DemoController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\demo\models\Demo';
}