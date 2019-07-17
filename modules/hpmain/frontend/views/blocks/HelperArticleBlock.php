<?php
$model = $this->extraValue('model');

if ($model) :
    ?>
    <div class="post-wrapper">
        <div class="post-header">
            <h1 class="post-title"><?= $model->name ?></h1>
            <div class="line-post">&nbsp;</div>
        </div>
        <div class="post-body text-justify"><?= $model->content ?></div>
    </div>
<?php endif; ?>