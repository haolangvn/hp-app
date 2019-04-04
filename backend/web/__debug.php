<?php

defined('YII_DEBUG') || define('YII_DEBUG', true);
defined('YII_ENV') || define('YII_ENV', 'dev');
defined('YII_APP_BASE_PATH') || define('YII_APP_BASE_PATH', __DIR__ . '/../../');

require(YII_APP_BASE_PATH . '/vendor/autoload.php');
require(YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php');
require(YII_APP_BASE_PATH . '/backend/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/backend/config/main.php'), 
    require(YII_APP_BASE_PATH . '/backend/config/main-local.php'), 
    require(YII_APP_BASE_PATH . '/configs/env-local-db.php')
);
// Check main config
//echo '<pre>'; print_r($config); echo '</pre>'; exit;
$application = new yii\web\Application($config);
$application->run();
