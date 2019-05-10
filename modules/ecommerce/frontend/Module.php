<?php

namespace app\modules\ecommerce\frontend;

/**
 * Estore Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0-dev.
 */
class Module extends \luya\base\Module {

    public $useAppViewPath = false;
    public $urlRules = [
        'ecom-<_c>' => 'ecom/<_c>/index',
        'ecom-<_c>/<_a>' => 'ecom/<_c>/<_a>',
        'clear-<_a>' => 'ecom/clear/<_a>'
    ];

}
