<?php

use luya\helpers\Url;
?>
<section class="showroom">
    <div class="container">
        <div class="filter">
            <div class="pull-right">
                <label>Tìm cửa hàng gần nhất: </label>
                <select id="province">
                    <?php
                    foreach ($listProvinces as $store) {
                        echo '<option value="' . $store['province'] . '">' . $store['province'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="showroom-list" class="row">

        </div>
    </div>
</section>
<?php
$css = <<< CSS
   .showroom {}
   .showroom .filter {margin-top: 25px;}
   .showroom .brand {
        margin-bottom: 10px;
        color: #9B0E62
    }
   .showroom .items {
        margin-bottom: 20px;
    }
   .showroom .items .icon {
       padding-right: 8px;
   }
        .showroom .items .name {
        
   }
   .showroom .items .item-body {
        color: #777;
    }
CSS;
$this->registerCss($css);


$urlGetShowroom = Url::toInternal(['main/store/get-showroom']);
$cookie_name = 'SELECT_REGION';

$js = <<< JS
window.onload = function(){

    getShowroom();

    $('#province').change(function(){
        let province = $(this).val();
        return getShowroom(province)
    });
        
    function getShowroom(province = null) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        if(province == null){
            let region = getCookie("{$cookie_name}");
            if(region != false){
                province = region;
            } else {
                province = 'TP Hồ Chí Minh';
            }
        } else {
            setCookie('{$cookie_name}', province, 365);
        }

            console.log(province);

        $.ajax({
            url: '{$urlGetShowroom}',
            data: 'province=' + province + '&_csrf=' + csrfToken,
            method: 'post',
            beforeSend: function() {
                $('#province').val(province);
            },
            success: function(html){
                console.log(html);
                if(html.success == 1){
                    let output_html = "";
                    $.each( html.data, function( i, item ) {

                        output_html += '<div class="col-md-12 brand">';	
                        output_html += '<h3><strong>' + i + '</strong></h3>';
                        output_html += '</div>';
                        $.each( item, function( u, node ) {						
                            output_html += '<div class="col-md-4 col-sm-6 col-xs-12 items">';
                            output_html += '<h4 class="name">'+node.name+'</h4>';
                            output_html += '<div class="item-body"><i class="glyphicon glyphicon-map-marker icon"></i> ';
                            output_html += node.address;
                            output_html += '<br/>';
                            output_html += '<i class="glyphicon glyphicon-phone-alt icon"></i>  ' + node.phone;
                            output_html += '</div>';
                            output_html += '</div>';
                        });
                        output_html += '<div class="clearfix"></div>';
                    });
                    $('#showroom-list').html(output_html);
                }
            }
        }).done(function() {
            console.log('Done');
        }).fail(function(jqXHR, textStatus ) {
            console.log(jqXHR);
        }).always( function() {} );
    }
};

JS;
$this->registerJs($js);
?>