<?php

namespace hpmain\admin;

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
        'api-main-ngrestlog' => 'hpmain\admin\apis\NgRestLogController',
        'api-main-province' => 'hpmain\admin\apis\ProvinceController',
        'api-main-district' => 'hpmain\admin\apis\DistrictController',
    ];

    public function getMenu() {
        return (new \luya\admin\components\AdminMenuBuilder($this))
                        ->node('Main', 'add_alert')
                        ->group('Location')
                        ->itemApi('Province', 'mainadmin/province/index', 'label', 'api-main-province')
                        ->itemApi('District', 'mainadmin/district/index', 'label', 'api-main-district')
                        ->group('Log')
                        ->itemApi('Change Log', 'mainadmin/ng-rest-log/index', 'label', 'api-main-ngrestlog');
    }

}
