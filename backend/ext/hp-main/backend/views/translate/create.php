<?php
/* @var $this yii\web\View */
/* @var $model hp\models\Translate */

$this->title = Yii::t('app', 'Create Translate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Translates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translate-create">

    <?=
    $this->render('_form', [
        'model' => $model
    ])
    ?>

</div>