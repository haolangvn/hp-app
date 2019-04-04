<?php

namespace app\modules\demo\admin;

/**
 * Demo Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module {

    public $apis = [
        'api-demo-demo' => 'app\modules\demo\admin\apis\DemoController',
    ];

    public function getMenu() {
        return (new \luya\admin\components\AdminMenuBuilder($this))
                        ->node('Demo', 'extension')
                        ->group('Group')
                        ->itemApi('Demo', 'demoadmin/demo/index', 'label', 'api-demo-demo');
    }

}
