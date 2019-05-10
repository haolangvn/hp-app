<?php

namespace hp\admin\controllers;

/**
 * Setting Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class SettingController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'hp\models\Setting';
}