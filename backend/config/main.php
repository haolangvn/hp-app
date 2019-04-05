<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'app-backend',
    'name' => 'Web Skeleton',
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'language' => 'vi', // en, ru
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'defaultRoute' => 'main/default/index',
    'aliases' => [
        '@bower' => '@vendor/bower',
        '@npm' => '@ext/npm-asset',
        '@hp' => '@ext/hp-main',
        '@mdm/admin' => '@ext/yii2-admin',
        '@modules/system' => '@ext/system',
        '@modules/users' => '@ext/users',
        '@app' => dirname(dirname(__DIR__)),
//        '@vova07/imperavi' => '@ext/yii2-imperavi-widget-master/src'
    ],
    'bootstrap' => [
        'log',
        'modules\users\Bootstrap',
    ],
    'modules' => [
        'users' => [
            'class' => 'modules\users\Module',
            'isBackend' => true
        ],
        'main' => 'hp\backend\Module',
        'rbac' => 'mdm\admin\Module',
        'system' => 'modules\system\Module',
        // modules
        'demo' => app\modules\demo\backend\Module::class
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'drWx549F9PFLEYpkv6mweYvTWZjMznLv',
            'csrfParam' => '_csrf-backend',
        //'baseUrl' => '/admin',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
//        'assetManager' => [
//            'bundles' => [
//                'yii\bootstrap\BootstrapAsset' => [
//                    'sourcePath' => '@vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist',
//                    'css' => [
//                        YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
//                    ]
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'sourcePath' => '@vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist',
//                    'js' => [
//                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
//                    ]
//                ],
//            ],
//        ],
        'user' => [
            'identityClass' => 'modules\users\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['/users/default/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'backend/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'enableStrictParsing' => false,
            'rules' => [
                '<_m>/<_c>' => '<_m>/<_c>/index',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
//            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'enableStrictParsing' => true,
            'rules' => [
                'email-confirm' => 'users/default/email-confirm'
            ],
        ],
//        'i18n' => [
//            'translations' => [
//                'yii2mod.rbac' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@modules/srbac/messages',
//                ],
//            // ...
//            ],
//        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'tablePrefix' => 'tbl_'
        ],
        'adminLanguage' => [
            'class' => \luya\admin\components\AdminLanguage::class,
        ],
        'composition' => [
            'class' => luya\web\Composition::class,
            'hidden' => true, // no languages in your url (most case for pages which are not multi lingual)
            'default' => ['langShortCode' => 'en'], // the default language for the composition should match your default language shortCode in the language table.
        ],
//        'formatter' => [
//            'class' => 'yii\i18n\Formatter',
//            'defaultTimeZone' => 'Asia/Ho_Chi_Minh',
//        ],
    ],
    'as access' => [
        'class' => '\mdm\admin\components\AccessControl',
        'allowActions' => [
            'users/*',
//            'rbac/*',
//            '/*'
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
        ]
    ],
    'as afterAction' => [
        'class' => 'modules\users\behavior\LastVisitBehavior'
    ],
    'params' => $params,
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module', 'allowedIPs' => ['*']];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [// HERE
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'adminlte' => '@hp/gii/templates/crud/simple',
                ]
            ]
        ],
    ];
//    $config['modules']['gii'] = ['class' => 'yii\gii\Module', 'allowedIPs' => ['*']];
}

return $config;
