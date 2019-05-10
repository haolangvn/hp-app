<?php

namespace app\modules\demo\admin\assets;

/**
 * Description of AppAssets
 *
 * @author HAO
 */
class AppAssets extends \luya\web\Asset {

    public $sourcePath = '@app/modules/demo/admin/resources';
    public $js = [
        'test.js'
    ];
    public $depends = [
        'luya\admin\assets\Main',
    ];

}
