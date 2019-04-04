<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model hp\models\Translate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="translate-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?php
        echo $form->field($model, 'category')->dropDownList([
            'label' => 'Label', 'menu' => 'Menu', 'model' => 'Model', 'button' => 'Button'
        ]);
        echo $form->field($model, 'language_code')->dropDownList($language);
        echo $form->field($model, 'message')->textInput(['maxlength' => true, 'placeholder' => 'Default English']);
        echo $form->field($model, 'translation')->textInput(['maxlength' => true]);
        ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>