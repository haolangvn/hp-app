<?php

/* @var $this yii\web\View */
/* @var $model hp\models\Store */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Store',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="store-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>