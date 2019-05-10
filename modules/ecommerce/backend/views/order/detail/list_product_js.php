<?php
use yii\helpers\Url;
/**
 *  JS for Promotion Lines (For Lines)
 */
$urlGetPromotionLine = Url::toRoute(['order-detail/get-promotion-by-id']);
$urlUpdatePromotionLine = Url::toRoute(['order-detail/update-promotion-by-id']);
$urlUpdateDescriptionLine = Url::toRoute(['order-detail/update-description-by-id']);
$js = <<< JS
        function resetProCheckbox(){
            $("input.proCheckbox").each(function( index ) {
                $(this).attr('checked', false);
                // default is yellow background
                $(this).parents('.col-md-4').css('background-color','#fff7cb');
            });
        }
        
        $('button.popupPromotion').bind('click', function(){
            let id = $(this).attr('data-id');
            $.ajax({
                url: '{$urlGetPromotionLine}',
                method: 'POST',
                data: 'id='+ id,
                success: function(data){
                    // reset all checkbox in modal before set new value  
                    resetProCheckbox();
                    $.each(data, function( index, value ) {
                        console.log(value);
                        if(value != ""){
                            // data trả ra map với các checkbox có sẵn trong Modal, nếu cái nào có thì tick vào
                            $('input[name='+value+']').attr('checked', true);     
                            // ô nào đã tick thì cho background màu xanh    
                            $('input[name='+value+']').parents('.col-md-4').css('background-color','#00a65a');
                        }
                        // set current id that can get it to update Promotion
                        $('#currentChosenPromotion').val(id);
                    });
                }
            });
           $('#modal-default').modal('show');
        });
                
                
        // Submit and Save by Ajax when pressing save button on modal
        $('#submitPromotion').bind('click', function(){
            let result = "";
            let id = $('#currentChosenPromotion').val();
            $("input.proCheckbox").each(function( index ) {
                if ( $(this).prop( "checked" )){
                   result += $(this).val()+','
                }
            });
            // Loại bỏ dấu phẩy cuối String 
            //(Mai170019,Mai180057,Mai180058,Mai180075,)
            // => (Mai170019,Mai180057,Mai180058,Mai180075)
            result = result.substring(0, result.length - 1);
                
            $.ajax({
                url: '{$urlUpdatePromotionLine}',
                method: 'POST',
                data: 'id='+ id + '&code=' +result,
                success: function(data){                                        
                    if(data != 0){
                        // reset all checkbox in modal before set new value  
                        resetProCheckbox();
                        $('#modal-default').modal('hide');
                        // set id null that can get it to update Promotion
                        $('#currentChosenPromotion').val("");
                        let output = "";
                        $.each(data, function( index, value ) {
                            output += "<span class='list-promotion-item'><i class='fa fa-check' /> "+value+"</span>";
                        });
                        $('#showpro_'+id).html(output);
                        // Clear All Description
                        $('#description_'+id).html("");
                    }else{
                        alert('Error!!!');
                    }
                }
            });     
        });
                
        // Update Description 
        $('.btnUpdateDescription').bind('click', function(){
            let id = $(this).attr('data-id');
            let desc = $('#description_'+id).val();
            $.ajax({
                url: '{$urlUpdateDescriptionLine}',
                method: 'POST',
                data: 'id='+ id + '&description=' + desc,
                success: function(data){    
                    let output = "";
                    if(data != 0){
                        output += "<span class='list-promotion-item'>Success</span>";
                    }else{
                        output += "<span class='list-promotion-item'>Error!</span>";
                    }
                    $('#showdesc_'+id).html(output);
                    setTimeout(function(){ 
                        $('#showdesc_'+id).html("");
                    }, 3000);
                
                    // Clear All Promotion 
                    $('#showpro_'+id).html("");
                }
            });     
        })
                
JS;
$this->registerJs($js);

/**
 *  JS for Promotion Header (For Bill)
 */
$urlGetPromotionBill = Url::toRoute(['order/get-promotion-by-id']);
$urlUpdatePromotionBill = Url::toRoute(['order/update-promotion-by-id']);
$urlUpdateDescriptionBill = Url::toRoute(['order/update-description-by-id']);
$js = <<< JS
        $('button.popupPromotionBill').bind('click', function(){
            let id = $(this).attr('data-id');
            $.ajax({
                url: '{$urlGetPromotionBill}',
                method: 'POST',
                data: 'id='+ id,
                success: function(data){
                    // reset all checkbox in modal before set new value  
                    resetProCheckbox();
                    $.each(data, function( index, value ) {
                        if(value != ""){
                            // data trả ra map với các checkbox có sẵn trong Modal, nếu cái nào có thì tick vào
                            $('input[name='+value+']').attr('checked', true);     
                            // ô nào đã tick thì cho background màu xanh    
                            $('input[name='+value+']').parents('.col-md-4').css('background-color','#00a65a');
                        }
                    });
                }
            });
           $('#modal-default-for-bill').modal('show');
        });
                
                
        // Submit and Save by Ajax when pressing save button on modal
        $('#submitPromotionBill').bind('click', function(){
            let result = "";
            let id = $('#currentChosenPromotionBill').val();
            $("input.proCheckboxBill").each(function( index ) {
                if ( $(this).prop( "checked" )){
                   result += $(this).val()+','
                }
            });
            // Loại bỏ dấu phẩy cuối String 
            //(Mai170019,Mai180057,Mai180058,Mai180075,)
            // => (Mai170019,Mai180057,Mai180058,Mai180075)
            result = result.substring(0, result.length - 1);
                
            $.ajax({
                url: '{$urlUpdatePromotionBill}',
                method: 'POST',
                data: 'id='+ id + '&code=' +result,
                success: function(data){                                        
                    if(data != 0){
                        // reset all checkbox in modal before set new value  
                        resetProCheckbox();
                        $('#modal-default-for-bill').modal('hide');
                        let output = "";
                        $.each(data, function( index, value ) {
                            output += "<span class='list-promotion-item'><i class='fa fa-check' /> "+value+"</span>";
                        });
                        $('#showproBill_'+id).html(output);
                        // Clear All Description
                        $('#descriptionBill_'+id).html("");
                    }else{
                        alert('Error!!!');
                    }
                }
            });     
        });
                
        // Update Description 
        $('.btnUpdateDescriptionBill').bind('click', function(){
            let id = $(this).attr('data-id');
            let desc = $('#descriptionBill_'+id).val();
            $.ajax({
                url: '{$urlUpdateDescriptionBill}',
                method: 'POST',
                data: 'id='+ id + '&description=' + desc,
                success: function(data){    
                    let output = "";
                    if(data != 0){
                        output += "<span class='list-promotion-item'>Success</span>";
                    }else{
                        output += "<span class='list-promotion-item'>Error!</span>";
                    }
                    $('#showdescBill_'+id).html(output);
                    setTimeout(function(){ 
                        $('#showdescBill_'+id).html("");
                    }, 3000);
                
                    // Clear All Promotion 
                    $('#showproBill_'+id).html("");
                }
            });     
        })
                
JS;
$this->registerJs($js);

/*
 * Check Tồn Kho theo Barcode
 */
$js = <<< JS
$('table a.check-stock').bind('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');    
    $.ajax({
        url:  "https://tgnh.com.vn/api/ItemStock?Type=2&BarCode="+id+"&callback=?",
        dataType: "jsonp",
        success: function( data ) {
            console.log( data); // server response
            $.each( data, function( i, item ) {
                console.log(item);
                $('blockquote').html('<p style="background-color: #FFF"><code>' + item.msg + '</code></p>');
                setTimeout(function(){ 
                    $('blockquote').html("");
                }, 6000);
          });
        }
    });
     return false;
});
JS;
$this->registerJs($js);
?>