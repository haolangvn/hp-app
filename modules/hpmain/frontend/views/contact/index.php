<?php

use yii\widgets\ActiveForm;
use hp\utils\UTranslate as UT;
?>
<section id="contact-form">
    <div class="col-md-offset-3 col-md-6">
        <div class="contact-form">
            <div class="row clearfix">
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <p><?= UT::t('Please fill out the form below:') ?></p>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                        <?= $form->field($model, 'fullname')->textInput(['placeholder' => $model->getAttributeLabel('fullname') . ' (*)', 'required' => true, 'data-placement' => 'bottom']) ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone') . ' (*)', 'required' => true, 'type' => 'number', 'data-placement' => 'bottom']) ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                        <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email'), 'type' => 'email', 'data-placement' => 'bottom']) ?>
                    </div>        
                    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                        <?= $form->field($model, 'address')->textInput(['placeholder' => $model->getAttributeLabel('address'), 'data-placement' => 'bottom']) ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <?= $form->field($model, 'subject')->textInput(['placeholder' => $model->getAttributeLabel('subject') . ' (*)', 'required' => true, 'rows' => 4]) ?>                    
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <?= $form->field($model, 'content')->textarea(['placeholder' => $model->getAttributeLabel('content') . ' (*)', 'required' => true, 'rows' => 4]) ?>                    
                    </div>
                    <?= \hp\validators\GCaptcha::viewCaptcha() ?>
                </div>

                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12"><small><b>(*) <?= UT::t('Required Fields') ?></b></small></div>
                    <div class="col-md-3 col-sm-3 col-xs-12 text-right">
                        <input type="submit" class="btn btn-default" value="<?= UT::t('Send', UT::TYPE_BUTTON) ?>">
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<?php
$css = <<< CSS
    #contact-form {
        background: #F2F2F2;
        padding-top: 30px;
        padding-bottom: 30px;
        overflow: hidden;
        } 
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
        height: 34px;
        text-align: center;
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
    #contact .form-group {margin-bottom: 0}
CSS;
$this->registerCss($css);
?>
