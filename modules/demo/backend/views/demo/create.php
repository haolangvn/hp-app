<?php

/* @var $this yii\web\View */
/* @var $model app\modules\demo\models\Demo */

$this->title = Yii::t('app', 'Create Demo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Demos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>