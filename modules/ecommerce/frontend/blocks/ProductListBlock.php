<?php

namespace app\modules\ecommerce\frontend\blocks;

use yii\helpers\ArrayHelper;
use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use app\modules\ecommerce\utils\UTerm;
use app\modules\ecommerce\models\search\ItemSearch;

/**
 * Product List Block.
 *
 * File has been created with `block/create` command. 
 */
class ProductListBlock extends PhpBlock {

    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'ecom';

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup() {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name() {
        return 'Product List Block';
    }

    /**
     * @inheritDoc
     */
    public function icon() {
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config() {
        $vars = [];
        if ($this->term) {
            foreach ($this->term as $k => $node) {
                ArrayHelper::remove($node, 'alias');
                $vars[] = [
                    'var' => $k,
                    'label' => $k,
                    'type' => self::TYPE_SELECT,
                    'options' => $node,
//                    'options' => BlockHelper::selectArrayOption($node)
                ];
            }
        }
        return [
            'vars' => $vars
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{vars.cate}}
     * @param {{vars.gender}}
     */
    public function admin() {
        $vars = '';
        if ($this->term) {
            foreach ($this->term as $k => $node) {
                $vars .= '{% if vars.' . $k . ' is not empty %}' .
                        '<tr><td><b>' . $k . '</b></td><td>{{vars.' . $k . '}}</td></tr>' .
                        '{% endif %}';
            }
        }
        return '<h5 class="mb-3">Product List Block</h5>' .
                '<table class="table table-bordered">' . $vars . '</table>';
    }

    public function extraVars() {
        $params = [];
        foreach ($this->term as $k => $n) {
            $params[strtolower($k)] = $this->getVarValue($k, null);
        }

        return [
            'productList' => ItemSearch::search($params),
            'params' => $params
        ];
    }

    public function init() {
        parent::init();
        $this->term = UTerm::getAll();
    }

    public $term = [];

}
