<?php

namespace hp\frontend\widgets;

/**
 * Description of ArticleBlock
 *
 * @author HAO
 */
class ArticleBlock extends \yii\base\Widget {

    // Article ID
    public $id;

    public function run() {
//        return $this->render('article_block', [
//                    'model' => \hp\models\Article::findOne($this->id)
//        ]);
////        return $this->render('article_block', [
////                    'model' => \hp\models\Article::findOne($this->id)
////        ]);
//
//        return time();
        $dependency = new \yii\caching\DbDependency([
            'sql' => 'SELECT max(updated_at) FROM hp_article',
        ]);
        return \hp\utils\UShort::cache()->getOrSet(['ARTICLE', $this->id], function() {
                    return $this->render('article_block', [
                                'model' => \hp\models\Article::findOne($this->id)
                    ]);
                }, 0, $dependency);
    }

}
