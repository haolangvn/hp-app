<?php

use yii\helpers\Url;
use hp\utils\UShort;
use yii\helpers\Html;
?>
<?= Html::csrfMetaTags() ?>
<div class="container" id="store">
    <div class="row">
        <div class="col-md-12 title col-xs-12">
            <h1>Thông Tin Cửa Hàng</h1>
            <hr>
        </div>  
        <div class="col-md-12 col-xs-12 col-sm-12 text-right">
            <div class="filter">
                <label>Tìm cửa hàng gần nhất: </label>
                <select  id="selectProvices">
                    <?php
                    $alias = 'tp-ho-chi-minh';
                    foreach ($listProvinces as $province) {
                        $selected = '';
                        if ($province->alias == $alias)
                            $selected = 'selected';
                        echo '<option value="' . $province->id . '" ' . $selected . '>' . $province->name . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="ResultShowroom">

        </div>
    </div>
    <?php
    $css = <<< CSS
    #store .title{
        margin-bottom: 20px;
    }
            
    #store .title h1{
        font-size: 40px;
        margin: 0px 0px 8px;
    }
        
CSS;
    $this->registerCss($css);
    ?>
<?php
$urlGetShowroom = Url::toRoute(['store/get-showroom']);
//$urlGetShowroom = Url::toRoute(['store/abc']);
$js = <<< JS
$('#selectProvices').change(function(){
    let id = $(this).val();
    return getShowroom(id)
});
        
getShowroom(701);
        
function getShowroom(id) {
    $.ajax({
        url: '{$urlGetShowroom}',
        data: 'id=' + id ,
        method: 'post',
        beforeSend: function() {
            
        },
        success: function(html){
            console.log(html);
            if(html.success == 1){
                let output_html = "";
                $.each( html.data, function( i, item ) {
                    
                    output_html += '<div class="col-sm-12 col-md-12 col-xs-12" style="margin-top: 20px; margin-bottom: 15px;">';	
                    output_html += '<p><strong style="font-size: 22px;"> ---------- '+i+' ---------- </strong></p>';
                    output_html += '</div>';
                    $.each( item, function( u, node ) {						
						output_html += '<p style="font-size: 15px; padding-left: 25px;">';
						output_html += '<b>* '+node.name+'</b>';
						output_html += '<br/>';
						output_html += ' &nbsp;&nbsp;&nbsp;'+node.address;
						output_html += '<br/>';
						output_html += '&nbsp;&nbsp;&nbsp;Điện thoại: ' + node.phone;
						output_html += '</p>';                        
                    });
                    
                });
                $('#ResultShowroom').html(output_html);
            }
        }
    }).done(function() {
        
    }).fail(function(jqXHR, textStatus ) {
        console.log(jqXHR);
    }).always(function() {
        
    });
}
JS;
$this->registerJs($js);
?>