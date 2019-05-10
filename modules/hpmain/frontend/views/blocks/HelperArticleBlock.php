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
?>
<div class="col-md-12">
    <div class="col-md-8">
        <?php
        if ($this->varValue('article')) {
            echo $this->extraValue('article');
        }
        ?>
    </div>
    <div class="col-md-4"></div>
</div>