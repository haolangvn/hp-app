<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modules\core\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'parent')->textInput() ?>

        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'weight')->textInput() ?>

        <?= $form->field($model, 'data')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>