<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use hp\utils\UFormat;
use yii\widgets\DetailView;
use hp\utils\UArray;
use kartik\editable\Editable;

//use app\modules\ecommerce\backend\assets\BackendAsset;
//
//$bundle = BackendAsset::register($this);
//use Yii;

/* @var $this yii\web\View */
/* @var $model app\modules\ecommerce\models\Order */

$this->title = Yii::t('app', 'Order No') . ': #' . $model->id . " - " . UFormat::datetime($model->created_at);
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
 Pjax::begin(['id'=>'id-pjax', 'clientOptions' => ['method' => 'POST']]);
?>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-solid box-orange">
                    <div class="box-header with-border">
                        <i class="fa fa-files-o"></i>
                        <h3 class="box-title text-yellow"><b>Info</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <label><?php echo Yii::t('app', 'User'); ?></label>:
                        <?php echo $model->updated_by; ?>
                        <br/>
                        <label><?php echo Yii::t('app', 'Bill No'); ?></label>:
                        <?php
                        echo Editable::widget([
                            'model' => $model,
                            'name' => 'billing',
                            'value' => $model->billing,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXT,
                            'header' => 'Billing',
                            'size' => 'md',
                        ]);
                        ?>

                        <br/>
                        <label><?php echo Yii::t('app', 'Note'); ?></label>: 
                        <?php
                        echo Editable::widget([
                            'model' => $model,
                            'name' => 'note_admin',
                            'value' => $model->note_admin,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXTAREA,
                            'header' => 'Note',
                            'size' => 'md',
                        ]);
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-solid box-orange">
                    <div class="box-header with-border">
                        <i class="fa fa-credit-card"></i>
                        <h3 class="box-title text-yellow"><b>Payment</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <label><?php echo Yii::t('app', 'Payment'); ?></label>: 
                        <?php
                        echo Editable::widget([
                            'model' => $model,
                            'name' => 'payment',
                            'value' => $model->payment,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXT,
                            'header' => 'payment',
                            'size' => 'md',
                        ]);
                        ?>
                        <br/>
                        <p>
                            <label><?php echo Yii::t('app', 'Payment Status'); ?></label>:
                            <?php echo $model->payment_status; ?>
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-solid box-orange">
                    <div class="box-header with-border">
                        <i class="fa fa-globe"></i>
                        <h3 class="box-title text-yellow"><b>Channel</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <label><?php echo Yii::t('app', 'Channel'); ?></label>:
                        <?php
                        echo Editable::widget([
                            'model' => $model,
                            'name' => 'channel',
                            'value' => $model->channel,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_DROPDOWN_LIST,
                            'data' => [0 => 'pass', 1 => 'fail', 2 => 'waived', 3 => 'todo'],
                            'options' => ['class' => 'form-control', 'prompt' => 'Select status...'],
                            'header' => 'Channel',
                            'size' => 'md',
                            'data' => [
                                'Website' => 'Website',
                                'Hotline' => 'Hotline',
                                'Viber' => 'Viber',
                                'Zalo' => 'Zalo',
                                'Facebook' => 'Facebook',
                                'PerfumeWorld' => 'PerfumeWorld',
                                'Minus 417' => 'Minus 417',
                                'Models Own' => 'Models Own'
                            ]
                        ]);
                        ?>
                        <br/>
                        <p>
                            <label><?php echo Yii::t('app', 'Device'); ?></label>:
                            <?php echo $model->device; ?>
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>            
        </div>
        <!-- Add new Product && set Status -->
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success btn-flat">Add</button>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 bg-blue text-center" style="padding:6px 10px 8px 10px">
                        <?php echo Yii::t('app', 'Status') ?>
                    </label>
                    <div class="col-md-9 " style="padding-left: 0; font-weight: bold">
                        <?php
                        $listStatus = app\modules\ecommerce\utils\UStatus::getAllShippingStatus();
                        echo Html::activeDropDownList($model, 'status', $listStatus , [
                            'class' => 'form-control',
                            'id' => 'orderStatus'
                        ]);
                        ?>
                    </div>      
                </div>
            </div>
        </div>
        <blockquote> </blockquote>
        <div class="order-view box box-solid" style="margin-top: 20px;">
            <?php
            echo $this->render('detail/list_product', [
                'model' => $model,
                'promotionSapHeader' => $promotionSapHeader,
                'promotionSapLines' => $promotionSapLines,
            ]);
            ?>
        </div>
    </div>
    <!-- end \.col-md-9 -->
    <div class="col-md-3">
        <?php
        echo $this->render('detail/customer', [
            'model' => $model
        ]);
        ?>
        <!-- End Box 2-->
    </div>
    <!-- end \.col-md-3 -->
</div>
<?php Pjax::end(); ?>
<?php
$css = <<< CSS
    table.item-list, table.item-list td, table.item-list th {
        border: 1px solid #ddd !important;
    }
        
    table.item-list thead{
        background-color: #f2f2f2
    }
        
    .nav-tabs li.active a{
        color: #478fca !important
    }
        
    hr {
        border-top: 1px solid #dce8f1;
        margin: 0 !important;
    }
        
    .nav-tabs-custom {
         box-shadow: none !important;   
        margin-bottom: 0px !important;
    }
        
    .box-orange {
        background: #fcf8e3 !important;
    }
        
    .bg-blue {
//        background: #204d74;
    }
CSS;
$this->registerCss($css);

$currentUrl = yii\helpers\Url::current();
$urlUpdateDetail = yii\helpers\Url::toRoute(['order/editable-detail']);
$js  = <<< JS
    $('#orderStatus').bind('change', function(){
        let data = $(this).val();
        $.ajax({
            url: '{$currentUrl}',
            method: 'POST',
            data: 'hasEditable=1&status='+ data,
            success: function(data){
                console.log(data)
            }
        });
    });
     
//    function abc() {       
//        $(document).on('ready pjax:end', function(event) {
//            $(event.target).initializeMyPlugin();
//            alert('1231');
//        })
//    }
JS;
$this->registerJs($js);
?>