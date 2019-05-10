<?php
/**
 * View file for block: TextTransformBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->cfgValue('test2');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
?>
<?php if ($this->varValue('mytext')): ?>
    <h1><?= $this->extraValue('textTransformed'); ?></h1>
<?php endif; ?>