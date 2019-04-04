<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\utils\UShort;

$this->title = 'Update Setting';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">
    <div>
        <?php $form = ActiveForm::begin(); ?>
        <?php
        echo Html::activeHiddenInput($model, 'id');
        echo Html::activeHiddenInput($model, 'type');
        $data = json_decode($model->value, true);

        $j = count($data);
        $num = common\utils\UShort::request()->get('num', 0);
        for ($i = 0; $i < $num; $i++) {
            $j += $i;
            $data["image{$j}"] = ['type' => 'image', 'range' => '', 'hint' => '', 'value' => ''];
            $data["link{$j}"] = ['type' => 'text', 'range' => '', 'hint' => '', 'value' => ''];
        }
        $i = 1;
        foreach ($data as $key => $node) {
            echo '<div class="form-group">';
            echo '<label class="control-label">' . $key . '</label>';

            echo Html::hiddenInput("Content[{$key}][type]", ArrayHelper::getValue($node, 'type'));
            echo Html::hiddenInput("Content[{$key}][range]", ArrayHelper::getValue($node, 'range'));
            echo Html::hiddenInput("Content[{$key}][hint]", ArrayHelper::getValue($node, 'hint'));

            switch ($node['type']) {
                case 'text' :
                    echo Html::textInput("Content[{$key}][value]", ArrayHelper::getValue($node, 'value'), ['class' => 'form-control']);
                    break;
                case 'textArea' :
                    echo Html::textarea("Content[{$key}][value]", ArrayHelper::getValue($node, 'value'), ['class' => 'form-control']);
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
                    break;
            }
            echo '<p class="help-block">' . $node['hint'] . '</p>';

            if (($i % 2) == 0) {
                echo Html::a('[ Delete Image ]', 'javascript:void()', [
                    'class' => 'text-danger',
                    'onclick' => '$(this).parent().prev().remove(); $(this).parent().remove();'
                ]);
                $i = 0;
            }
            echo '</div>';
            $i++;
        }
        ?>
        <div class="text-right">
            <?=
            Html::a('New Image', ['update',
                'id' => $model->id,
                '_ajax' => UShort::request()->get('_ajax'),
                'num' => UShort::request()->get('num') + 1
                    ], ['class' => 'btn']);
            ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
