<?php

namespace app\modules\ecommerce\admin\assets;

use luya\web\Asset;

class AdminAsset extends Asset
{
    public $sourcePath = '@app/modules/ecommerce/admin/resources';
    
    public $js = [
        'productAttributes.js',
//        'group.js'
    ];
    
    public $depends = [
        'luya\admin\assets\Main',
    ];
}
