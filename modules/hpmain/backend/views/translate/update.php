<?php

/* @var $this yii\web\View */
/* @var $model hpmain\models\base\Translate */

$this->title = 'Update Translate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="translate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>