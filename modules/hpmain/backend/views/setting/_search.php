<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model hpmain\models\search\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-search">

    <?php
    $form = ActiveForm::begin([
                'id' => 'search',
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
    ]);
    ?>

    <div class="col-md-2 pull-right">
        <div class="row">
            <?=
            $form->field($model, 'lang_id')->dropDownList($model->getLang(), [
                'onchange' => '$("#search").submit()',
                'prompt' => 'Select Language'
            ])->label(false)
            ?>
        </div>
    </div>


        <?php // echo $form->field($model, 'updated_at')   ?>

    <div class="form-group">
<?php // Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary'])   ?>
    <?php // Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default'])   ?>
    </div>

<?php ActiveForm::end(); ?>

</div>