<?php

namespace app\modules\ecommerce\frontend\assets;

use app\assets\M417Asset;

/**
 * Description of ProductListAsset
 *
 * @author HAO
 */
class ProductListAsset extends \yii\web\AssetBundle {

    public $sourcePath = '@app/modules/ecommerce/frontend/resource';
    public $js = [
        'default/js/page.js',
        'default/js/loadingoverlay.js',
        'default/js/jquery.lazyload.js'
    ];
    public $css = [
        'default/css/roboto-font.css',
        'default/css/item.css'
    ];
    public $depends = [
        'app\assets\M417Asset'
    ];

}
