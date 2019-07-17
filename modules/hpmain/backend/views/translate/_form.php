<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use hp\utils\UTranslate as UT;

/* @var $this yii\web\View */
/* @var $model hpmain\models\Translate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="translate-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?php
        echo $form->field($model, 'category')->dropDownList([
            UT::TYPE_LABEL => UT::TYPE_LABEL,
            UT::TYPE_MENU => UT::TYPE_MENU,
            UT::TYPE_MODEL => UT::TYPE_MODEL,
            UT::TYPE_BUTTON => UT::TYPE_BUTTON,
            UT::TYPE_APP => UT::TYPE_APP,
        ]);
        echo $form->field($model, 'language_code')->dropDownList($model::getLangDropList());
        echo $form->field($model, 'message')->textInput(['maxlength' => true, 'placeholder' => 'Default English']);
        echo $form->field($model, 'translation')->textInput(['maxlength' => true]);
        ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>