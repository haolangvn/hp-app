<?php

namespace app\modules\ecommerce\admin;

/**
 * Estore Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0.
 */
class Module extends \luya\admin\base\Module {

    public $apis = [
        'api-ecommerce-vocabulary' => 'app\modules\ecommerce\admin\apis\VocabularyController',
        'api-ecommerce-term' => 'app\modules\ecommerce\admin\apis\TermController',
        'api-ecommerce-group' => 'app\modules\ecommerce\admin\apis\GroupController',
        'api-ecommerce-product' => 'app\modules\ecommerce\admin\apis\ProductController',
        'api-ecommerce-set' => 'app\modules\ecommerce\admin\apis\SetController',
        'api-ecommerce-setattribute' => 'app\modules\ecommerce\admin\apis\SetAttributeController',
        'api-ecommerce-article' => 'app\modules\ecommerce\admin\apis\ArticleController',
        'api-ecommerce-barcode' => 'app\modules\ecommerce\admin\apis\BarcodeController',
        'api-ecommerce-item' => 'app\modules\ecommerce\admin\apis\ItemController',
        'api-ecommerce-price' => 'app\modules\ecommerce\admin\apis\PriceController',
        'api-ecommerce-currency' => 'app\modules\ecommerce\admin\apis\CurrencyController',
        'api-ecommerce-producer' => 'app\modules\ecommerce\admin\apis\ProducerController',
        'api-ecommerce-pricelist' => 'app\modules\ecommerce\admin\apis\PriceListController',
        'api-ecommerce-productarticle' => 'app\modules\ecommerce\admin\apis\ProductArticleController',
        'api-ecommerce-producerarticle' => 'app\modules\ecommerce\admin\apis\ProducerArticleController',
    ];

    public function getMenu() {
        return (new \luya\admin\components\AdminMenuBuilder($this))
                        ->node('eCommerce', 'store_mall_directory')
                        ->group('Products')
                        ->itemApi('Vocabularies', 'ecomadmin/vocabulary/index', 'games', 'api-ecommerce-vocabulary')
                        ->itemApi('Terms', 'ecomadmin/term/index', 'view_module', 'api-ecommerce-term')
                        ->itemApi('Groups', 'ecomadmin/group/index', 'folder', 'api-ecommerce-group')
                        ->itemApi('Products', 'ecomadmin/product/index', 'library_books', 'api-ecommerce-product')
                        ->itemApi('Items', 'ecomadmin/item/index', 'label', 'api-ecommerce-item')
                        ->itemApi('Prices', 'ecomadmin/price/index', 'adjust', 'api-ecommerce-price')
                        ->itemApi('Barcodes', 'ecomadmin/barcode/index', 'label_important', 'api-ecommerce-barcode')
                        ->itemApi('Producers', 'ecomadmin/producer/index', 'domain', 'api-ecommerce-producer')
                        ->group('Article')
                        ->itemApi('Products', 'ecomadmin/product-article/index', 'label', 'api-ecommerce-productarticle')
                        ->itemApi('Producers', 'ecomadmin/producer-article/index', 'label', 'api-ecommerce-producerarticle')
                        ->group('Settings')
                        ->itemApi('Currencies', 'ecomadmin/currency/index', 'attach_money', 'api-ecommerce-currency')
                        ->itemApi('Price List', 'ecomadmin/price-list/index', 'toc', 'api-ecommerce-pricelist')
                        ->group('Sets')
                        ->itemApi('Sets', 'ecomadmin/set/index', 'web_asset', 'api-ecommerce-set')
                        ->itemApi('Attributes', 'ecomadmin/set-attribute/index', 'check_box', 'api-ecommerce-setattribute');
    }

    public function getAdminAssets() {
        return [
            'app\modules\ecommerce\admin\assets\AdminAsset',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function onLoad() {
//        self::registerTranslation('estoreadmin*', static::staticBasePath() . '/messages', [
//            'estoreadmin' => 'estoreadmin.php',
//        ]);
    }

    /**
     * {@inheritDoc}
     */
    public static function t($message, array $params = []) {
        return parent::baseT('estoreadmin', $message, $params);
    }

}
