<?php

namespace app\modules\ecommerce\backend\assets;

use yii\web\AssetBundle;

class BackendAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/ecommerce/backend/assets/default';
    
    public $js = [
//        'js/bootstrap-editable.min.js?ver=1.0.1',
        'js/order.js',
    ];
    
    public $css = [
//        'css/bootstrap-editable.css',
    ];
    
   public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
