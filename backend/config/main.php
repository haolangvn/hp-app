<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'app-backend',
    'name' => 'Web Skeleton',
//    'language' => 'vi', // en-US, vi-VN, ru
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'defaultRoute' => 'main/default/index',
    'aliases' => [
        /**
         * Default config
         */
        '@app' => dirname(dirname(__DIR__)),
        '@bower' => '@vendor/bower',
        '@npm' => '@backend/ext/npm-asset',
        '@mdm/admin' => '@backend/ext/yii2-admin',
        '@modules/system' => '@backend/ext/system',
        '@modules/users' => '@backend/ext/users',
        '@hp' => '@app/modules/core',
        '@hpmain' => '@app/modules/hpmain',
        '@hpec' => '@app/modules/ecom',
        '@hpnews' => '@app/modules/news',
    /*
     * 
     */
    ],
    'bootstrap' => [
        'log',
        'modules\users\Bootstrap',
    ],
    'modules' => [
        /**
         * Default Module
         */
        'users' => 'modules\users\Module',
        'rbac' => 'mdm\admin\Module',
        'system' => 'modules\system\Module',
        'main' => 'hpmain\backend\Module',
        'ecom' => 'hpec\backend\Module',
        'news' => 'hpnews\backend\Module',
        'demo' => app\modules\demo\backend\Module::class
    ],
    'components' => [
        'request' => [
            'enableCsrfValidation' => false,
            'enableCookieValidation' => true,
            'cookieValidationKey' => 'drWx549F9PFLEYpkv6mweYvTWZjMznLv',
            'csrfParam' => '_csrf_admin',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',
            'itemChildTable' => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
        ],
        'user' => [
            'class' => 'luya\admin\components\AdminUser',
//            'identityClass' => 'modules\users\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['/users/default/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => '_ss_admin',
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
            'errorAction' => 'main/error/error',
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
            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'enableStrictParsing' => true,
            'rules' => [
                'email-confirm' => 'users/default/email-confirm'
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'locale' => 'vi-VN',
            // format theo Format ICU
            // dieu chinh FormatDate sẽ anh huong den tim kiem kieu du lieu date
            'dateFormat' => 'dd/MM/yyyy',
            'datetimeFormat' => 'dd/MM/yy, HH:mm',
        ],
        // luya components
        'adminLanguage' => [
            'class' => 'luya\admin\components\AdminLanguage',
        ],
        'composition' => [
            'class' => 'luya\web\Composition',
            'default' => [
                'langShortCode' => 'vi',
                'countryShortCode' => 'vn'
            ], // the default language for the composition should match your default language shortCode in the language table.
        ],
        'adminuser' => [
            'class' => 'luya\admin\components\AdminUser',
            'defaultLanguage' => 'en',
            'enableAutoLogin' => true
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
    ],
//    'as access' => [
//        'class' => '\mdm\admin\components\AccessControl',
//        'allowActions' => [
//            'users/*',
//            'rbac/*',
//            'gii/*',
//            '/*'
//        // The actions listed here will be allowed to everyone including guests.
//        // So, 'admin/*' should not appear here in the production, of course.
//        // But in the earlier stages of your development, you may probably want to
//        // add a lot of actions here until you finally completed setting up rbac,
//        // otherwise you may not even take a first step.
//        ]
//    ],
//    'as afterAction' => [
//        'class' => 'modules\users\behavior\LastVisitBehavior'
//    ],
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
