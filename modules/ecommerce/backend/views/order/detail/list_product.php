<?php

use yii\helpers\ArrayHelper;
use hp\utils\UFormat;
use kartik\editable\Editable;
use yii\helpers\Url;
?>
<div class="box-body table-responsive no-padding">
    <table class="table table-bordered item-list">
        <thead>
            <tr>
                <th>#</th>
                <th style="align-content: center">Image</th>
                <th class="text-center"><?php echo Yii::t('app', 'Product') ?></th>
                <th class="text-center"><?php echo Yii::t('app', 'Price') ?></th>
                <th class="text-center"><?php echo Yii::t('app', 'Qty') ?></th>
                <th class="text-center"><?php echo Yii::t('app', 'Dis') ?></th>
                <th class="text-center"><?php echo Yii::t('app', '%') ?></th>
                <th class="text-center"><?php echo Yii::t('app', 'Cost') ?></th>
                <th><?php echo Yii::t('app', 'Note') ?></th>
                <th><?php echo Yii::t('app', 'Promotion') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($model->details as $item) {
                $bg_color = ($i % 2 == 0) ? '#fcf8e3' : '#fff7cb';
                $product = \yii\helpers\Json::decode($item->product);
                ?>
                <tr style="background-color: <?php echo $bg_color; ?>">
                    <td><?php echo $i; ?></td>
                    <td style="width: 40px">
                        <img class="img-responsive" src="https://forlap.ristekdikti.go.id/dosen/showfoto/aW1hZ2UvanBlZw~~/MTlGMjQ3N0UtN0U5Ny00RTg1LUI4QkItRUFDNTUwODVDRkRD">
                    </td>
                    <td>
                        <b><?php echo ArrayHelper::getValue($product, 'name'); ?> </b>
                        <br/>                        
                        <a class="check-stock" href="#" data-id="<?php echo ArrayHelper::getValue($product, 'code'); ?>" target="_blank">
                            <?php echo ArrayHelper::getValue($product, 'code'); ?>
                        </a>
                    </td>
                    <td class="text-right"><?php echo UFormat::decimal($item->price); ?></td>                            
                    <td class="text-center">
                        <?php
                        echo Editable::widget([
                            'name' => 'Detail-quantity',
                            'value' => $item->quantity,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXT,
                            'header' => 'Quantity',
                            'size' => 'md',
                            'pjaxContainerId' => 'id-pjax',
                            'formOptions' => [
                                'action' => Url::toRoute(['order/editable-detail', 'id' => $item->id]),
                            ],
                            'showAjaxErrors' => true,
                            'pluginEvents' => [
                                "editableSuccess" => "(event, val, form, data) => { 
                                    console.log('Successful submission of value ' + val); 
                                     $.pjax.reload({container: '#id-pjax', timeout : false});
                                }",
                                "editableError" => "function(event, val, form, data) { log('Error while submission of value ' + val); }",
                                "editableAjaxError" => "(event, jqXHR, status, message) => { console.log(message); }",
                            ]
                        ]);
                        ?>
                    </td>
                    <td class="text-right">
                        <?php
                        echo Editable::widget([
                            'name' => 'Detail-discount',
                            'value' => $item->discount,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXT,
                            'formOptions' => [
                                'action' => Url::toRoute(['order/editable-detail', 'id' => $item->id]),
                            ],
                            'header' => 'Discount',
                            'size' => 'md',
                            'pjaxContainerId' => 'id-pjax',
                            'showAjaxErrors' => true,
                            'pluginEvents' => [
                                "editableSuccess" => "(event, val, form, data) => { 
                                     $.pjax.reload({container: '#id-pjax', timeout : false});
                                }",
                                "editableError" => "function(event, val, form, data) { log('Error while submission of value ' + val); }",
                                "editableAjaxError" => "(event, jqXHR, status, message) => { console.log(message); }",
                            ]
                        ]);
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                        echo Editable::widget([
                            'name' => 'Detail-discount_per',
                            'value' => $item->discount_per,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXT,
                            'formOptions' => [
                                'action' => Url::toRoute(['order/editable-detail', 'id' => $item->id]),
                            ],
                            'header' => 'Discount Percent',
                            'size' => 'md',
                            'pjaxContainerId' => 'id-pjax',
                            'showAjaxErrors' => true,
                            'pluginEvents' => [
                                "editableSuccess" => "(event, val, form, data) => { 
                                     $.pjax.reload({container: '#id-pjax', timeout : false});
                                }",
                                "editableError" => "function(event, val, form, data) { log('Error while submission of value ' + val); }",
                                "editableAjaxError" => "(event, jqXHR, status, message) => { console.log(message); }",
                            ]
                        ]);
                        ?></td>
                    <td class="text-right"><?php echo UFormat::decimal($item->cost); ?></td>                            
                    <td rowspan="1">
                        <?php
                        echo Editable::widget([
                            'model' => $model,
                            'name' => 'Detail-note',
                            'value' => $item->note,
                            'asPopover' => true,
                            'inputType' => Editable::INPUT_TEXTAREA,
                            'formOptions' => [
                                'action' => Url::toRoute(['order/editable-detail', 'id' => $item->id]),
                            ],
                            'header' => 'Note',
                            'size' => 'md',
                            'pjaxContainerId' => 'id-pjax',
                            'showAjaxErrors' => true,
                            'pluginEvents' => [
                                "editableSuccess" => "(event, val, form, data) => { 
                                     $.pjax.reload({container: '#id-pjax', timeout : false});
                                }",
                                "editableError" => "function(event, val, form, data) { log('Error while submission of value ' + val); }",
                                "editableAjaxError" => "(event, jqXHR, status, message) => { console.log(message); }",
                            ]
                        ]);
                        ?></td>
                    <!-- Promotion -->
                    <td>
                        <div class="col-md-12" style="margin-bottom: 10px;">
                            <button class="btn btn-success btn-block btn-xs popupPromotion" data-type="line" data-id="<?php echo $item->id; ?>" id="btn_promotion_<?php echo $item->id; ?>">Choose Promotion</button>                           
                            <div id="showpro_<?php echo $item->id; ?>" class="form-group has-warning">
                                <?php
                                $temp = trim($item->promotion_code);
                                if (substr($temp, -1) == ",") {
                                    $temp = substr($temp, 0, -1);
                                }
                                $arrPro = explode(",", $temp);
                                $output = "";
                                foreach ($promotionSapLines as $value) {
                                    if (in_array($value->code, $arrPro)) {
                                        $output .= "<span class='list-promotion-item'><i class='fa fa-check'></i> " . $value->name . "</span>";
                                    }
                                }
                                echo $output;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea class="update-detail" id="description_<?php echo $item->id ?>"  rows="2" style="width: 100%">
                                <?php echo $item->description; ?>
                            </textarea>
                            <button class="btn btn-primary btn-block btn-xs btnUpdateDescription" data-type="line" data-id="<?php echo $item->id ?>">Update Description</button>
                            <div id="showdesc_<?php echo $item->id; ?>" class="form-group has-warning">

                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $i++;
            } // end Foreach  
            ?>            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right">
                    <strong>Tổng đơn hàng:</strong>
                </td>
                <td class="text-right">
                    <?php echo UFormat::decimal($model->total); ?>
                </td>
                <td colspan="2" rowspan="3">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <button class="btn btn-success btn-block btn-xs popupPromotionBill" data-type="bill" data-id="<?php echo $model->id; ?>" id="btn_promotion_bill_<?php echo $model->id; ?>">Choose Promotion</button>                           
                        <div id="showproBill_<?php echo $model->id; ?>" class="form-group has-warning">
                            <?php
                            $temp = trim($model->promotion_code);
                            if (substr($temp, -1) == ",") {
                                $temp = substr($temp, 0, -1);
                            }
                            $arrPro = explode(",", $temp);
                            $output = "";
                            foreach ($promotionSapHeader as $value) {
                                if (in_array($value->code, $arrPro)) {
                                    $output .= "<span class='list-promotion-item'><i class='fa fa-check'></i> " . $value->name . "</span>";
                                }
                            }
                            echo $output;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <textarea class="update-detail" id="descriptionBill_<?php echo $model->id ?>"  rows="2" style="width: 100%">
                            <?php echo $model->description; ?>
                        </textarea>
                        <button class="btn btn-primary btn-block btn-xs btnUpdateDescriptionBill" data-type="bill" data-id="<?php echo $model->id ?>">Update Description</button>
                        <div id="showdescBill_<?php echo $model->id; ?>" class="form-group has-warning">

                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <strong><?php echo Yii::t('app', 'Dis') ?>:</strong>
                </td>
                <td class="text-right">
                    <?php
                    echo Editable::widget([
                        'model' => $model,
                        'name' => 'discount',
                        'value' => $model->discount,
                        'asPopover' => true,
                        'inputType' => Editable::INPUT_TEXT,
                        'header' => 'Discount',
                        'size' => 'md',
                        'pjaxContainerId' => 'id-pjax',
                            'showAjaxErrors' => true,
                            'pluginEvents' => [
                                "editableSuccess" => "(event, val, form, data) => { 
                                     $.pjax.reload({container: '#id-pjax', timeout : false});
                                }",
                                "editableError" => "function(event, val, form, data) { log('Error while submission of value ' + val); }",
                                "editableAjaxError" => "(event, jqXHR, status, message) => { console.log(message); }",
                            ]
                    ]);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <strong><?php echo Yii::t('app', '%') ?>:</strong>
                </td>
                <td class="text-right">
                    <?php
                    echo Editable::widget([
                        'model' => $model,
                        'name' => 'discount_per',
                        'value' => $model->discount_per,
                        'asPopover' => true,
                        'inputType' => Editable::INPUT_TEXT,
                        'header' => 'Discount Percent',
                        'size' => 'md',
                        'pjaxContainerId' => 'id-pjax',
                            'showAjaxErrors' => true,
                            'pluginEvents' => [
                                "editableSuccess" => "(event, val, form, data) => { 
                                     $.pjax.reload({container: '#id-pjax', timeout : false});
                                }",
                                "editableError" => "function(event, val, form, data) { log('Error while submission of value ' + val); }",
                                "editableAjaxError" => "(event, jqXHR, status, message) => { console.log(message); }",
                            ]
                    ]);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <strong>Tổng tiền:</strong>
                </td>
                <td class="text-right">
                    <?php echo UFormat::decimal($model->cost + $model->shipping_cost); ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal Promotion -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Promotion Lines</h4>
            </div>
            <div class="modal-body list-promotion">
                <div class="row">
                    <?php
                    $output = "";
                    foreach ($promotionSapLines as $value) {
                        $output .= '<div class="col-md-4">';
                        $output .= '<div class="checkbox">';
                        $output .= '<label>';
                        $output .= '<input rel-type="' . $value->type . '" rel-data="line" type="checkbox" rel="prm_sap" class="proCheckbox" name="' . $value->code . '" value="' . $value->code . '" rel-description="' . $value->name . '"> ';
                        $output .= "<i class='fa fa-info-circle' data-toggle='tooltip' data-placement='bottom' title='" . $value->description . "'></i> ";
                        $output .= $value->name;
                        $output .= '</label>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                    echo $output;
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="currentChosenPromotion" value="" />
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitPromotion">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-default-for-bill">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Promotion Bill</h4>
            </div>
            <div class="modal-body list-promotion">
                <div class="row">
                    <?php
                    $output = "";
                    foreach ($promotionSapHeader as $value) {
                        $output .= '<div class="col-md-4">';
                        $output .= '<div class="checkbox">';
                        $output .= '<label>';
                        $output .= '<input rel-type="' . $value->type . '" rel-data="line" type="checkbox" rel="prm_sap" class="proCheckboxBill" name="' . $value->code . '" value="' . $value->code . '" rel-description="' . $value->name . '"> ';
                        $output .= "<i class='fa fa-info-circle' data-toggle='tooltip' data-placement='bottom' title='" . $value->description . "'></i> ";
                        $output .= $value->name;
                        $output .= '</label>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                    echo $output;
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="currentChosenPromotionBill" value="<?php echo $model->id; ?>" />
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitPromotionBill">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
$css = <<< CSS
    .list-promotion .col-md-4 {
        background-color: #fff7cb;
        border: 1px solid #ddd !important;
    }
        
    .list-promotion-item {
        display: block;
        color: #f39c12;
        font-weight: 700;
    }
        
    .list-promotion-item i.fa{
        color: #00a65a;
    }
CSS;
$this->registerCss($css);

//Load All js for this List Product
 echo $this->render('list_product_js');