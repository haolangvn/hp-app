<?php

use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\bootstrap\Html;
use kartik\editable\Editable;
?>
<div class="box box-solid">
    <div class="box-body no-padding">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab">
                        <i class="fa fa-info-circle"></i> Khách Hàng
                    </a>
                </li>
                <li>
                    <a href="#tab_2" data-toggle="tab">
                        <i class="fa fa-h-square"></i> HĐ VAT
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1" >
                    <hr/>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'class' => 'table table-striped table-bordered detail-view'
                        ],
                        'attributes' => [
                            [
                                'attribute' => 'sex',
                                'format' => 'raw',
                                'value' =>
                                Editable::widget([
                                    'model' => $model->customer,
                                    'name' => 'Customer-gender',
                                    'value' => (ArrayHelper::getValue($model->customer, 'gender') == 1) ? 'Anh' : 'Chị',
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                    'options' => ['class' => 'form-control', 'prompt' => 'Select status...'],
                                    'header' => 'Gender',
                                    'size' => 'md',
                                    'placement' => 'left',
                                    'data' => [
                                        '1' => 'Anh',
                                        '2' => 'Chị',
                                    ]
                                ]),
                            ],
                            [
                                'attribute' => 'fullname',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->customer,
                                    'name' => 'Customer-fullname',
                                    'value' => ArrayHelper::getValue($model->customer, 'fullname'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXT,
                                    'header' => 'Fullname',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                            [
                                'attribute' => 'phone',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->customer,
                                    'name' => 'Customer-phone',
                                    'value' => ArrayHelper::getValue($model->customer, 'phone'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXT,
                                    'header' => 'Phone',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                            [
                                'attribute' => 'district',
                                'format' => 'raw',
                                'value' => ArrayHelper::getValue($model->customer, 'district_id')
                            ],
                            [
                                'attribute' => 'province',
                                'format' => 'raw',
                                'value' => ArrayHelper::getValue($model->customer, 'province_id')
                            ],
                            [
                                'attribute' => 'Address',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->customer,
                                    'name' => 'Customer-address',
                                    'value' => ArrayHelper::getValue($model->customer, 'address'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXTAREA,
                                    'header' => 'Address',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                        ],
                    ])
                    ?>
                </div>
                <!-- /.tab-pane 1-->
                <div class="tab-pane" id="tab_2">
                    <hr/>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'class' => 'table table-striped table-bordered detail-view'
                        ],
                        'attributes' => [
                            [
                                'attribute' => 'Name',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->vat,
                                    'name' => 'Vat-name',
                                    'value' => ArrayHelper::getValue($model->vat, 'name'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXT,
                                    'header' => 'Name',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                            [
                                'attribute' => 'Tax Code',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->vat,
                                    'name' => 'Vat-tax_code',
                                    'value' => ArrayHelper::getValue($model->vat, 'tax_code'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXT,
                                    'header' => 'Tax Code',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                            [
                                'attribute' => 'Address',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->vat,
                                    'name' => 'Vat-address',
                                    'value' => ArrayHelper::getValue($model->vat, 'address'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXTAREA,
                                    'header' => 'Address',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                        ],
                    ])
                    ?>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</div>
<!-- End Box 1-->
<div class="box box-solid">
    <div class="box-body no-padding">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab">
                        <i class="fa fa-truck"></i> Người nhận
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1" >
                    <hr/>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'class' => 'table table-striped table-bordered detail-view'
                        ],
                        'attributes' => [
                            [
                                'attribute' => 'fullname',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->shipment,
                                    'name' => 'Shipment-fullname',
                                    'value' => ArrayHelper::getValue($model->shipment, 'fullname'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXT,
                                    'header' => 'Fullname',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                            [
                                'attribute' => 'phone',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->shipment,
                                    'name' => 'Shipment-phone',
                                    'value' => ArrayHelper::getValue($model->shipment, 'phone'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXT,
                                    'header' => 'Phone',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                            [
                                'attribute' => 'Address',
                                'format' => 'raw',
                                'value' => Editable::widget([
                                    'model' => $model->shipment,
                                    'name' => 'Shipment-address',
                                    'value' => ArrayHelper::getValue($model->shipment, 'address'),
                                    'asPopover' => true,
                                    'inputType' => Editable::INPUT_TEXTAREA,
                                    'header' => 'Address',
                                    'placement' => 'left',
                                    'size' => 'md',
                                ]),
                            ],
                        ],
                    ])
                    ?>
                </div>
                <!-- /.tab-pane 1-->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</div>