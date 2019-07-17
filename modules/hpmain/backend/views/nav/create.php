<?php

/* @var $this yii\web\View */
/* @var $model hpmain\models\NavItem */

$this->title = 'Create Nav Item';
$this->params['breadcrumbs'][] = ['label' => 'Nav Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>