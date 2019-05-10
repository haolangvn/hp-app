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
        'api-demo-test' => 'app\modules\demo\admin\apis\TestController',
    ];

    public function getMenu() {
        return (new \luya\admin\components\AdminMenuBuilder($this))
                        ->node('Demo', 'extension')
                        ->group('Group')
                        ->itemApi('Demo', 'demoadmin/demo/index', 'label', 'api-demo-demo')
                        ->itemRoute('Finder', 'demoadmin/finder/index', 'important_devices')
                        ->itemApi('Test', 'demoadmin/test/index', 'label', 'api-demo-test');
    }

    public function getAdminAssets() {
        return [
            assets\AppAssets::class
        ];
    }

}
