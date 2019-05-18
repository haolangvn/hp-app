<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use luya\cms\models\NavContainer;

$container = ArrayHelper::map(NavContainer::find()->select('id, name')->asArray()->all(), 'id', 'name');
?>

<div class="nav-item-search">

    <div class="col-md-12">
        <div class="pull-right">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'search-form',
                        'action' => ['index'],
                        'method' => 'get',
                        'options' => [
                            'data-pjax' => 1,
                            'class' => 'form-inline'
                        ],
            ]);
            ?>

            <?=
            $form->field($model, 'build_tree')->checkbox([
                'onchange' => '$("#search-form").submit()'
            ])
            ?>

            <?=
            $form->field($model, 'container')->label(false)->dropDownList($container, [
                'prompt' => '=== Group ===',
                'onchange' => '$("#search-form").submit()'
            ])
            ?>


        </div>
    </div>


    <?php // $form->field($model, 'nav_id') ?>

    <?php // $form->field($model, 'lang_id') ?>

    <?php // $form->field($model, 'nav_item_type') ?>

    <?php // $form->field($model, 'nav_item_type_id') ?>

    <?php // echo $form->field($model, 'create_user_id') ?>

    <?php // echo $form->field($model, 'update_user_id') ?>

    <?php // echo $form->field($model, 'timestamp_create') ?>

    <?php // echo $form->field($model, 'timestamp_update') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'title_tag')    ?>

    <div class="form-group">
        <?php // Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>