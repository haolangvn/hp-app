<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use hp\utils\UShort;
?>
<div class="container" id="contact">
    <div class="row">
        <div class="col-md-12 title col-xs-12">
            <h1>Liên Hệ</h1>            
        </div>  
    </div>
    <?php
    $form = ActiveForm::begin([
                'id' => 'faq-form',
//                    'options' => ['class' => 'col-md-12 col-sm-12 col-xs-12 form-main clearfix'],
                'enableClientValidation' => false,
                'enableClientScript' => false,
                'fieldConfig' => [
                    'template' => "{input}"
                ]
    ]);
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:15px;">
            <hr>
            <p>Vui lòng điền thông tin dưới đây:</p>
        </div>
        <?php
        if ($flash = UShort::session()->getFlash('success')) {
            echo '<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px">';
            echo '<p class="alert alert-success">' . $flash . '</p>';
            echo '</div>';
        }
        ?>

        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
            <?= $form->field($model, 'fullname')->textInput(['placeholder' => 'Họ và tên (*)', 'required' => true, 'data-placement' => 'bottom']) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'type' => 'email', 'data-placement' => 'bottom']) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Điện thoại (*)', 'required' => true, 'type' => 'number', 'data-placement' => 'bottom']) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
            <?= $form->field($model, 'address')->textInput(['placeholder' => 'Địa chỉ', 'data-placement' => 'bottom']) ?>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <?= $form->field($model, 'content')->textarea(['placeholder' => 'Nội dung (*)', 'required' => true]) ?>                    
        </div>



    </div>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12"><small><b>* Phần bắt buộc</b></small></div>
        <div class="col-md-3 col-sm-3 col-xs-12"><input type="submit" class="butt_2" value="Gửi"></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$css = <<< CSS
    #contact {margin-bottom: 20px} 
    #contact .title h1{
        font-size: 40px;
        margin: 0px 0px 8px;
    }
        
    #contact .col-md-4.form-group {
        font-family: 'IntroRegularAlt';
        font-size: 16px;
        margin: 0px 0px 16px;
        padding: 0px 15px;
    }
        
    #contact .form-control {
        display: block;
        /* font-size: 14px !important; */
        /* padding: .375rem .75rem; */
        margin: 0px 0px 16px;
        padding: 10px 12px;
        /* font-size: 1rem; */
        line-height: 1.5;
        color: #495057;
        font: 400 16px Arial !important;
        overflow: visible;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;        
    }
        
    #contact input.form-control{
        height: 37px;
    }
        
    #contact input[type="submit"] {
        background: #b99845;
        border: solid 1px #b99845;
        color: #fff;
        width: 166px;
        height: 34px;
        text-align: center;
        padding-top: 6px;
        line-height: 20px;
        display: inline-block;
        text-transform: uppercase;
        font-size: 14px;
    }
        
    #contact input[type="submit"]:hover {
        background: #7d7d7d;
        border: solid 1px #7d7d7d;
        color: #fff;
    }
CSS;
$this->registerCss($css);
?>
