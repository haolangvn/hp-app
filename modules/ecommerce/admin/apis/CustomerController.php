<?php

namespace app\modules\ecommerce\admin\apis;

/**
 * Customer Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class CustomerController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\ecommerce\models\Customer';
}