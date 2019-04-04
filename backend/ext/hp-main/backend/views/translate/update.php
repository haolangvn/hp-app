<?php

/* @var $this yii\web\View */
/* @var $model hp\models\Translate */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Translate',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Translates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="translate-update">

    <?= $this->render('_form', [
        'model' => $model,
        'language' => $language
    ]) ?>

</div>