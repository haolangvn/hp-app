<?php

namespace app\modules\ecommerce\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Text Transform Block.
 *
 * File has been created with `block/create` command. 
 */
class TextTransformBlock extends PhpBlock {

    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'ecommerce';

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
    public function icon() {
        return 'extension'; // https://design.google.com/icons/
    }

    public function name() {
        return 'Transformed Text';
    }

    public function config() {
        return [
            'vars' => [
                ['var' => 'mytext', 'label' => 'The Text', 'type' => self::TYPE_TEXT],
            ],
        ];
    }

    public function extraVars() {
        return [
            'textTransformed' => strtoupper($this->getVarValue('mytext')),
        ];
    }

    public function admin() {
        return 'Administrations View: ';
    }

    public function getFieldHelp() {
        return [
            'content' => 'An explain example of what this var does and where it is displayed.',
        ];
    }

}
