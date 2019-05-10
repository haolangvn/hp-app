<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model hp\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?=
        $form->field($model, 'content')->widget(\vova07\imperavi\Widget::class, [
            'settings' => [
                'minHeight' => 200,
                'language' => 'en',
                'plugins' => [
                    'clips',
                    'fullscreen'
                ],
//                'fileUpload' => Url::to(['/main/file/file-upload']),
//                'fileDelete' => Url::to(['/main/file/file-delete']),
//                'fileManagerJson' => Url::to(['/main/file/files-get']),
//                'imageUpload' => Url::to(['/main/file/image-upload']),
            ],
//            'plugins' => [
//                'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset',
//            ],
        ]);
        ?>


    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>