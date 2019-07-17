<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use hp\utils\UShort;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

backend\assets\AppAsset::register($this);
$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index box-default">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-8">
                <?=
                Html::textInput('Filter', '', [
                    'id' => 'filter-control',
                    'class' => 'form-control',
                    'placeholder' => 'Filter by tag',
                ]);
                ?>
            </div>
            <div class="col-md-4 text-right">
                <?php $form = ActiveForm::begin(); ?>
                <div class="pull-right">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
                </div>
                <div class="pull-right">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Add new tag'])->label(false) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
    <div class="box-body table-responsive">

        <span id="api" class="hidden" data-href="<?= Url::current() ?>"></span>
        <span id="pk_id" class="hidden" data-value="<?= UShort::request()->get('pk_id', 0) ?>"></span>
        <span id="table_name" class="hidden" data-value="<?= UShort::request()->get('table_name', 0) ?>"></span>
        <div class="tag-list">
            <?php
            $t = ArrayHelper::map($tags, 'id', 'name');
            foreach ($data as $item) {
                $class = array_key_exists($item->id, $t) ? 'label-danger' : 'label-default';
                echo '<a href="" class="label btn-sm ' . $class . ' tag-item" data-value="' . $item->id . '">' . $item->name . '</a>';
            }
            ?>
        </div>
    </div>
</div>

<?php
$js = <<<JS
        
AddTag();
Filter();
        
function Filter(){
    $('#filter-control').bind('keyup', function(){
        var search = $(this).val();
        if(search != ''){
            $('.tag-list a').addClass('hidden');
            $('.tag-list a').filter(":contains('" + search + "')").removeClass('hidden');
        } else {
            $('.tag-list a').removeClass('hidden');
        }
    });
}
function AddTag() {
    $('a.tag-item').bind('click', function(){
        var pk_id = $('#pk_id').attr('data-value');
        var table_name = $('#table_name').attr('data-value');
        var tag_id = $(this).attr('data-value');
        var e = $(this);
        
        if(pk_id == 0 || table_name == 0 || !tag_id){
            alert('nothing');
            return false;
        }
        
        $.ajax({
            url: $('#api').attr('data-href'),
            data: 'pk_id=' + pk_id + '&table_name=' + table_name + '&tag_id=' + tag_id,
            method: 'post',
            beforeSend: function () {},
            success: function (html) {
                e.toggleClass('btn-primary');
//                location.reload();
//                $('div.tag-list').html(html);
            }
        }).done(function () {
        }).fail(function (jqXHR, textStatus) {
            console.log(jqXHR);
        }).always(function () {
        });
        
    });
}
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>