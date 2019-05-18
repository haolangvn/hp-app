<?php
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