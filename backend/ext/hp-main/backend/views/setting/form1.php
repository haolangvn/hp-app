<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Params';
$this->params['breadcrumbs'][] = ['label' => 'Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">
        <div class="setting-create">

            <div class="setting-form">

                <?php $form = ActiveForm::begin(['method' => 'get']); ?>

                <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'type')->dropDownList(['richtext' => 'Rich Text', 'json' => 'Json']) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>

