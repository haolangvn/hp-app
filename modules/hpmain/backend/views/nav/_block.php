<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use luya\helpers\Json;
?>

<div class="nav-item-form box">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?php
        $content = '';
        $tabs = '';
        $i = 0;
        foreach ($blocks as $key => $node) {

            $json_values = [];
            $config = [];

            if ($node->block_class) {
                $object = Yii::createObject($node->block_class, []);
                $config = $object->getConfigVarsExport();
            }

            if (Json::isJson($node->json_config_values)) {
                $json_values = Json::decode($node->json_config_values);
            }

            if ($config) {

                $tabs .= Html::beginTag('li', ['class' => ($i == 0) ? 'active' : '']);
                $tabs .= Html::a($object->name(), '#tab_' . $key, ['data-toggle' => 'tab', 'aria-expanded' => 'false']);
                $tabs .= Html::endForm('li');
                $content .= Html::beginTag('div', [
                            'class' => ($i == 0) ? 'tab-pane active' : 'tab-pane',
                            'id' => 'tab_' . $key
                ]);
                $i++;

                foreach ($config as $item) {
                    $content .= '<div class="form-group field-navitemblock-value">';
                    $content .= '<label class="class="control-label"">' . $item['label'] . '</label>';

                    $name = "NavItemBlock[{$key}][{$item['var']}]";
                    $value = ArrayHelper::getValue($json_values, $item['var']);

                    $content .= Html::tag('span', ' (' . $item['type'] . ')');
                    if ($item['var'] === 'image') {

                        $content .= \alexantr\elfinder\InputFile::widget([
                                    'name' => $name,
                                    'value' => $value,
                                    'clientRoute' => '/main/file/input',
                                    'filter' => ['image'],
                                    'preview' => function ($value) {
                                        return yii\helpers\Html::img($value, ['width' => 200]);
                                    },
                        ]);
                    } else if ($item['type'] === 'zaa-wysiwyg' || $item['type'] === 'zaa-textarea') {
                        $content .= \vova07\imperavi\Widget::widget([
                                    'settings' => [
                                        'minHeight' => 200,
                                        'language' => 'en',
                                        'plugins' => [
                                            'clips',
                                            'fullscreen'
                                        ],
                                    ],
                                    'name' => $name,
                                    'value' => $value,
                        ]);
                    } else if ($item['type'] === 'zaa-select') {
                        $options = ArrayHelper::map($item['options'], 'value', 'label');
                        $content .= Html::dropDownList($name, $value, $options, ['class' => 'form-control', 'prompt' => '=== Chọn ===']);
                    } else if ($item['type'] === 'zaa-checkbox-array') {
                        
                    } else {
                        $content .= Html::textInput($name, $value, ['class' => 'form-control']);
                    }

                    $content .= '</div>';
                }

                $content .= Html::endTag('div');
            }
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?= $tabs ?>
                    </ul>
                    <div class="tab-content">
                        <?= $content ?>
                    </div>
                </div>  
            </div>
            <div class="col-md-12">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
            </div>
        </div>


    </div>

    <?php ActiveForm::end(); ?>
</div>