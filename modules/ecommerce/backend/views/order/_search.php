<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecommerce\models\search\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'billing') ?>

    <?= $form->field($model, 'ocustomer_id') ?>

    <?= $form->field($model, 'oshipment_id') ?>

    <?= $form->field($model, 'shipping_cost') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'discount_per') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'note_admin') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'payment_status') ?>

    <?php // echo $form->field($model, 'device') ?>

    <?php // echo $form->field($model, 'channel') ?>

    <?php // echo $form->field($model, 'isSync') ?>

    <?php // echo $form->field($model, 'promotion_type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>