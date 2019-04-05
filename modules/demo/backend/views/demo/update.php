<?php

/* @var $this yii\web\View */
/* @var $model app\modules\demo\models\Demo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Demo',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Demos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="demo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>