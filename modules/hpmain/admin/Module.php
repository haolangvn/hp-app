<?php

namespace hp\admin;

/**
 * Hpmain Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module {

    public $apis = [
        'api-main-ngrestlog' => 'hp\admin\apis\NgRestLogController',
    ];

    public function getMenu() {
        return (new \luya\admin\components\AdminMenuBuilder($this))
                        ->node('Logs', 'add_alert')
                        ->group('Group')
                        ->itemApi('Change Log', 'mainadmin/ng-rest-log/index', 'label', 'api-main-ngrestlog');
    }

}
