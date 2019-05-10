<?php

namespace app\modules\ecommerce\admin\controllers;

/**
 * Currency Controller.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 */
class CurrencyController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\ecommerce\models\Currency';
}
