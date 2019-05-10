<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

//use zxbodya\yii2\tinymce\TinyMce;

$this->title = 'Update Params';
$this->params['breadcrumbs'][] = ['label' => 'Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">
        <div class="setting-create">

            <div>
                <?php $form = ActiveForm::begin(); ?>

                <?= Html::activeHiddenInput($model, 'id') ?>
                <?= Html::activeHiddenInput($model, 'type') ?>
                <?= $form->field($model, 'name')->hint("ID: {{$model->id}}", ['class' => 'help-block'])->textInput(['maxlength' => true]) ?>

                <?php
                if ($model->type == 'richtext') {
                    echo $form->field($model, 'value')->widget(\vova07\imperavi\Widget::class, [
                        'settings' => [
                            'minHeight' => 200,
                            'language' => 'en',
                            'plugins' => [
                                'clips',
                                'fullscreen'
                            ],
                            'fileUpload' => Url::to(['/main/file/file-upload']),
                            'fileDelete' => Url::to(['/main/file/file-delete']),
                            'fileManagerJson' => Url::to(['/main/file/files-get']),
                            'imageUpload' => Url::to(['/main/file/image-upload']),
                            'clips' => [
                                ['Lorem ipsum...', 'Lorem...'],
                                ['red', '<span class="label-red">red</span>'],
                                ['green', '<span class="label-green">green</span>'],
                                ['blue', '<span class="label-blue">blue</span>'],
                            ],
                        ],
                        'plugins' => [
                            'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset',
                        ],
                    ]);
                } else {
                    if ($model->isNewRecord) {
                        echo '<div id="setting">';
                        echo '<div id="key">';
                        echo '<hr/>';
                        echo '<div class="form-group">';
                        echo Html::textInput('Key[]', '', array('id' => '', 'placeholder' => 'Key', 'value' => '', 'class' => 'form-control', 'maxlength' => 255));
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo Html::dropDownList('Type[]', '', [
                            'text' => 'TextField',
                            'textArea' => 'TextArea',
                            'image' => 'Image',
                            'range' => 'Range'
                                ], array(
                            'id' => '',
                            'placeholder' => 'Range',
                            'class' => 'form-control',
                            'onchange' => 'if($(this).val()=="range") { $(this).next().css({"display":"block"}); } else {$(this).next().css({"display":"none"});} '
                        ));

                        echo '<div style="display: none"><br/>';
                        echo Html::textInput('Range[]', '', array('id' => '', 'placeholder' => 'Data,data,data...', 'value' => '', 'class' => 'form-control', 'maxlength' => 255));
                        echo '</div>';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo Html::textInput('Hint[]', '', array('id' => '', 'placeholder' => 'Hint', 'value' => '', 'class' => 'form-control', 'maxlength' => 255));
                        echo '</div>';

                        echo '</div>';
                        echo '</div>';

                        echo '<div class="form-group text-right">';
                        echo Html::buttonInput('New Key', [
                            'onclick' => '$("#setting").append($("#key").html());',
                            'class' => 'btn'
                        ]);
                        echo '</div>';
                    } else {
                        $data = Json::decode($model->value);
//                ksort($data);
                        if ($data) {
                            foreach ($data as $key => $node) {
                                echo '<div class="form-group">';
                                echo '<label class="control-label">' . $key . '</label>';

                                echo Html::hiddenInput("Content[{$key}][type]", ArrayHelper::getValue($node, 'type'));
                                echo Html::hiddenInput("Content[{$key}][range]", ArrayHelper::getValue($node, 'range'));
                                echo Html::hiddenInput("Content[{$key}][hint]", ArrayHelper::getValue($node, 'hint'));

                                switch (ArrayHelper::getValue($node, 'type')) {
                                    case 'text' :
                                        echo Html::textInput("Content[{$key}][value]", ArrayHelper::getValue($node, 'value'), ['class' => 'form-control']);
                                        break;
                                    case 'textArea' :
                                        echo Html::textarea("Content[{$key}][value]", ArrayHelper::getValue($node, 'value'), ['class' => 'form-control', 'rows' => 8]);
                                        break;
                                    case 'range':
                                        $range = array_map('trim', explode(',', ArrayHelper::getValue($node, 'range')));
                                        $arr = [];
                                        if (is_array($range)) {
                                            foreach ($range as $k => $v) {
                                                $arr[$v] = $v;
                                            }
                                        }
                                        echo Html::dropDownList("Content[{$key}][value]", ArrayHelper::getValue($node, 'value'), $arr, ['class' => 'form-control']);
                                        break;
                                    case 'image' :
                                        echo \zxbodya\yii2\elfinder\ElFinderInput::widget([
                                            'connectorRoute' => '/image/connector',
                                            'name' => "Content[{$key}][value]",
                                            'value' => ArrayHelper::getValue($node, 'value'),
                                        ]);
//                            echo Html::textInput("Content[{$key}][value]", $node['value'], ['class' => 'form-control']);
                                        break;
                                }
                                echo '<p class="help-block">' . ArrayHelper::getValue($node, 'hint') . '</p>';
                                echo '</div>';
                            }
                        }
                    }
                }
                ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-icon btn-save btn-success' : 'btn btn-save btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>

