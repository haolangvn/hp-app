<?php

/**
 * This is the base config. It doesn't hold any information about the database and is only used for local development.
 * Use env-local-db.php to configure you database.
 */
/*
 * Enable or disable the debugging, if those values are deleted YII_DEBUG is false and YII_ENV is prod.
 * The YII_ENV value will also be used to load assets based on environment (see assets/ResourcesAsset.php)
 */
defined('YII_ENV') or define('YII_ENV', 'local');
defined('YII_DEBUG') or define('YII_DEBUG', true);

$config = [
    /*
     * For best interoperability it is recommend to use only alphanumeric characters when specifying an application ID.
     */
    'id' => 'app-backend',
    /*
     * The name of your site, will be display on the login screen
     */
    'siteTitle' => 'Web Skeleton',
    /*
     * Let the application know which module should be executed by default (if no url is set). This module must be included
     * in the modules section. In the most cases you are using the cms as default handler for your website. But the concept
     * of LUYA is also that you can use a website without the CMS module!
     */
    'defaultRoute' => 'cms',
    'timeZone' => 'Asia/Ho_Chi_Minh',
    /*
     * Define the basePath of the project (Yii Configration Setup)
     */
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@common' => dirname(__DIR__) . '/common',
        '@hp' => '@app/modules/core',
        '@hpmain' => '@app/modules/hpmain',
        '@hpec' => '@app/modules/ecom',
        '@hpnews' => '@app/modules/news',
    ],
    'modules' => [
        /*
         * If you have other admin modules (e.g. cmsadmin) then you going to need the admin. The Admin module provides
         * a lot of functionality, like storage, user, permission, crud, etc. But the basic concept of LUYA is also that you can use LUYA without the
         * admin module.
         *
         * @secureLogin: (boolean) This will activate a two-way authentication method where u get a token sent by mail, for this feature
         * you have to make sure the mail component is configured correctly. You can test this with console command `./vendor/bin/luya health/mailer`.
         */
        'admin' => [
            'class' => 'luya\admin\Module',
            'secureLogin' => false, // when enabling secure login, the mail component must be proper configured otherwise the auth token mail will not send.
            'strongPasswordPolicy' => false, // If enabled, the admin user passwords require strength input with special chars, lower, upper, digits and numbers
            'interfaceLanguage' => 'en', // Admin interface default language. Currently supported: en, de, ru, es, fr, ua, it, el, vi, pt, fa
        ],
        /*
         * Frontend module for the `cms` module.
         */
        'cms' => [
            'class' => 'luya\cms\frontend\Module',
            'contentCompression' => true, // compressing the cms output (removing white spaces and newlines)
        ],
        /*
         * Admin module for the `cms` module.
         */
        'cmsadmin' => [
            'class' => 'luya\cms\admin\Module',
            'hiddenBlocks' => [],
            'blockVariations' => [],
        ],
        /*
         * hp module
         */
        'main' => 'hpmain\frontend\Module',
        'mainadmin' => 'hpmain\admin\Module',
        /*
         * ecommerce module
         */
        //'ecom' => 'hpec\frontend\Module',
        //'ecomadmin' => 'hpec\admin\Module',
//        /*
//         * demo module
//         */
//        'demo' => 'app\modules\demo\frontend\Module',
//        'demoadmin' => 'app\modules\demo\admin\Module',
    ],
    'components' => [
        // error when use command line
//        'request' => [
//            'enableCsrfValidation' => true,
//            'cookieValidationKey' => 'drWx549F9PFLEYpkv6mweYvTWZjMznLv',
//            'csrfParam' => '_csrf',
//        ],
        /*
         * Add your smtp connection to the mail component to send mails (which is required for secure login), you can test your
         * mail component with the luya console command ./vendor/bin/luya health/mailer.
         */
        'mail' => [
            'host' => null,
            'username' => null,
            'password' => null,
            'from' => null,
            'fromName' => null,
        ],
        /*
         * The composition component handles your languages and they way your urls will look like. The composition components will
         * automatically add the language prefix which is defined in `default` to your url (the language part in the url  e.g. "yourdomain.com/en/homepage").
         *
         * hidden: (boolean) If this website is not multi lingual you can hide the composition, other whise you have to enable this.
         * default: (array) Contains the default setup for the current language, this must match your language system configuration.
         */
        'composition' => [
            'hidden' => false, // no languages in your url (most case for pages which are not multi lingual)
            'default' => [
                'langShortCode' => 'vi',
//                'countryShortCode' => 'vn'
            ], // the default language for the composition should match your default language shortCode in the language table.
        ],
        /*
         * If cache is enabled LUYA will cache cms blocks and speed up the system in different ways. In the prep config
         * we use the DummyCache to imitate the caching behavior, but actually nothing gets cached. In production you should
         * use caching which matches your hosting environment. In most cases yii\caching\FileCache will result in fast website.
         *
         * http://www.yiiframework.com/doc-2.0/guide-caching-data.html#cache-apis
         */
        'cache' => [
//            'class' => 'yii\caching\DummyCache', // use: yii\caching\FileCache
            'class' => 'yii\caching\FileCache'
        ],
        /*
         * Translation component. If you don't have translations just remove this component and the folder `messages`.
         */
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
        'formatter' => [
            'locale' => 'vi-VN',
            // format theo Format ICU
            // dieu chinh FormatDate sẽ anh huong den tim kiem kieu du lieu date
            'dateFormat' => 'dd/MM/yyyy',
            'datetimeFormat' => 'dd/MM/yy, HH:mm',
        ],
        'menu' => [
            'class' => 'hp\components\Menu',
        ],
        'adminuser' => [
            'class' => 'luya\admin\components\AdminUser',
            'defaultLanguage' => 'en',
            'enableAutoLogin' => true
        ],
        'storage' => [
            'class' => 'luya\admin\filesystem\LocalFileSystem',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'class' => 'yii\web\Session',
            'name' => '_ss_admin',
            'cookieParams' => ['httponly' => true, 'lifetime' => 60 * 60 * 24],
            'timeout' => 60 * 60 * 24, //session expire
            'useCookies' => true,
        ],
        'cart' => [
            'class' => 'hpec\shoppingcart\Cart',
            'id' => 'shoppingcart',
//            'storage' => [
//                'class' => 'hscstudio\cart\MultipleStorage',
//                'storages' => [
//                    ['class' => 'hscstudio\cart\SessionStorage'],
//                    [
//                        'class' => 'hscstudio\cart\DatabaseStorage',
//                        'table' => 'cart',
//                    ],
//                ],
//            ]
        ],
//        'assetManager' => [
//            'appendTimestamp' => true,
//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'jsOptions' => [
//                        'async' => 'async'
//                    ],
//                ],
//            ],
//        ],
    ],
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module', 'allowedIPs' => ['*']];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module', 'allowedIPs' => ['*']];
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
}


return \yii\helpers\ArrayHelper::merge($config, require('env-local-db.php'));
