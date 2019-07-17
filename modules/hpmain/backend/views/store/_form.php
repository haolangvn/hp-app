<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use hpmain\models\Province;
use luya\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model hpmain\models\Store */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
            <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Location</a></li>
            <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">Content</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sort_order')->textInput() ?>

                <?= $form->field($model, 'is_hidden')->dropDownList(hp\utils\UData::boolean()) ?>

            </div>
            <div role="tabpanel" class="tab-pane" id="location">

                <?= $form->field($model, 'system')->dropDownList(\hp\utils\UData::system(), ['prompt' => '=== Chọn ===']) ?>

                <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'province')->dropDownList(ArrayHelper::map(Province::getAll(), 'name', 'name')) ?>

                <?= $form->field($model, 'coordinates')->textInput(['maxlength' => true]) ?>

            </div>

            <div role="tabpanel" class="tab-pane" id="content">

                <?=
                $form->field($model, 'image')->widget(\alexantr\elfinder\InputFile::className(), [
                    'clientRoute' => '/main/file/input',
                    'filter' => ['image'],
                    'preview' => function ($value) {
                        return yii\helpers\Html::img($value, ['width' => 200]);
                    },
                ])
                ?>

                <?= $form->field($model, 'content')->widget(\alexantr\ckeditor\CKEditor::className())?>

            </div>

        </div>



    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>