<?php

namespace app\modules\ecommerce\frontend\assets;

use yii\web\AssetBundle;

class FrontendAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/ecommerce/frontend/assets/default';
    
    public $js = [
//        'js/bootstrap-editable.min.js?ver=1.0.1',
        'js/page.js',
        'js/loadingoverlay.js',
        'js/jquery.lazyload.js'
    ];
    
    public $css = [
//        'css/bootstrap-editable.css',
        'css/roboto-font.css',
        'css/item.css'
    ];
    
   public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
