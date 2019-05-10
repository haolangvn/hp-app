<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecommerce\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'billing')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ocustomer_id')->textInput() ?>

        <?= $form->field($model, 'oshipment_id')->textInput() ?>

        <?= $form->field($model, 'shipping_cost')->textInput() ?>

        <?= $form->field($model, 'total')->textInput() ?>

        <?= $form->field($model, 'cost')->textInput() ?>

        <?= $form->field($model, 'discount')->textInput() ?>

        <?= $form->field($model, 'discount_per')->textInput() ?>

        <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'note_admin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'payment_status')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'device')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'channel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'isSync')->textInput() ?>

        <?= $form->field($model, 'promotion_type')->textInput() ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'created_by')->textInput() ?>

        <?= $form->field($model, 'updated_by')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>