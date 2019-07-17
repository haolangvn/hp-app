<?php

/* @var $this yii\web\View */
/* @var $model hpmain\models\Contact */

$this->title = Yii::t('app', 'Create Contact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>