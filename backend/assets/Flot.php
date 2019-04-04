<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 8:16 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class Flot extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/flot';
    /**
     * @var array
     */
    public $js = [
        'jquery.flot.js'
    ];
    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class
    ];
}
