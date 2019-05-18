<?php

namespace hp\frontend;

/**
 * Hpmain Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\base\Module {

    public $urlRules = [
        'main/<_c>' => 'main/<_c>/index',
        'main/<_c>/<_a>' => 'main/<_c>/<_a>',
    ];

}
