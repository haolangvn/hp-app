<?php

/* @var $this yii\web\View */
/* @var $model hp\models\Contact */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contact',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contact-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>