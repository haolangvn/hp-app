<?php

namespace app\modules\ecommerce\admin\controllers;

/**
 * Price Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class PriceController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\ecommerce\models\Price';
}