<?php
/**
 * View file for block: HelperArticleBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->varValue('id');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$model = $this->extraValue('model');

if ($model) {
    ?>
    <h1><?= $model->name ?></h1>
    <div class="col-md-12">
        <div class="col-6 text-justify">
            <?= $model->content ?>
        </div>
    </div>

<?php }
?>