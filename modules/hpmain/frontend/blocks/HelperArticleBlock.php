<?php

namespace hp\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use hp\models\Article;

/**
 * Helper Article Block.
 *
 * File has been created with `block/create` command. 
 */
class HelperArticleBlock extends PhpBlock {

    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'main';

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
        return 'Helper Article Block';
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
        return [
            'vars' => [
                ['var' => 'article', 'label' => 'Article Item', 'type' => self::TYPE_SELECT, 'options' => $this->getArticles()]
            ],
        ];
    }

    public function getArticles() {
        return Article::find()->select('id value, name label')->asArray()->all();
    }

    public function extraVars() {
        $model = Article::findOne($this->getVarValue('article'));
        return [
            'article' => ($model) ? $model->content : null,
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{vars.article}}
     */
    public function admin() {
        return '<h5 class="mb-3">Helper Article Block</h5>' .
                '<table class="table table-bordered">' .
                '{% if vars.article is not empty %}' .
                '<tr><td><b>Article Item</b></td><td>{{vars.article}}</td></tr>' .
                '{% endif %}' .
                '</table>';
    }

}
