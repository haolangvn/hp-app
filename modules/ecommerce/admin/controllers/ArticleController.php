<?php

namespace app\modules\ecommerce\admin\controllers;

/**
 * Article Controller.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0-dev.
 */
class ArticleController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\ecommerce\models\Article';
    
    public function actionArticleAttributes()
    {
        return $this->render('articleattribute');
    }
}
