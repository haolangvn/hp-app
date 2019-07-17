<?php

namespace app\modules\demo\frontend;

/**
 * Demo Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\base\Module {

    public $useAppViewPath = false;

    public $urlRules = [
        'demo/<_c>' => 'main/<_c>/index',
        'demo/<_c>/<_a>' => 'main/<_c>/<_a>',
    ];
}
