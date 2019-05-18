<?php
/* @var $this yii\web\View */
/* @var $model hp\models\NavItem */

$this->title = 'Update Nav Item: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Nav Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nav-item-update">

    <?=
    $this->render($page ? '_block' : '_form', [
        'model' => $model,
        'blocks' => $blocks,
    ])
    ?>

</div>