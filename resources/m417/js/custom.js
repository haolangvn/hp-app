// JavaScript Document



window.onload = function () {

    $(".navbar-toggler").click(function (e) {
        e.preventDefault();
        //$(".navbar-toggler").toggleClass("active");
        $('.mobile-level-2, .mobile-level-3').css('display', 'none');
    });



    $('.coleql_height').matchHeight();

    $(".cat_info_s").slideUp().removeClass('d-none');
    $(".rdmo").click(function (e) {
        e.preventDefault();
        $(".cat_info_s").slideToggle();
    });

    $(".carousel").on("touchstart", function (event) {
        var xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function (event) {
            var xMove = event.originalEvent.touches[0].pageX;
            if (Math.floor(xClick - xMove) > 5) {
                $(".carousel").carousel('next');
            } else if (Math.floor(xClick - xMove) < -5) {
                $(".carousel").carousel('prev');
            }
        });
        $(".carousel").on("touchend", function () {
            $(this).off("touchmove");
        });

    });

    $(".searbutton").click(function (e) {
        e.preventDefault();
        $(".search_open").toggleClass("active");
    });

//$(".coleql_height .search_product").hover(function(e) {
//e.preventDefault();
//$(this).siblings(".add_cart").toggleClass("active");
//});



    var owl = $('.CarouselOwl');
    owl.owlCarousel({
        margin: 20,
        rtl: false,
        nav: true,
        loop: false,
        responsive: {
            0: {items: 1},
            480: {items: 1},
            544: {items: 1},
            768: {items: 2},
            992: {items: 4},
            1200: {items: 4}
        }
    })


    var owl2 = $('.CarouselOwl2');
    owl2.owlCarousel({
        margin: 20,
        rtl: false,
        nav: true,
        loop: true,
        autoWidth: true,
        responsive: {
            0: {items: 1},
            480: {items: 1},
            544: {items: 2},
            768: {items: 3},
            992: {items: 5},
            1200: {items: 5}
        }
    })

    var owl3 = $('.CarouselOwl3');
    owl3.owlCarousel({
        margin: 20,
        rtl: false,
        nav: true,
        loop: true,
        responsive: {
            0: {items: 2},
            480: {items: 2},
            544: {items: 2},
            768: {items: 3},
            992: {items: 5},
            1200: {items: 5}
        }
    })

    var owl4 = $('.CarouselOwl4');
    owl4.owlCarousel({
        margin: 0,
        rtl: false,
        nav: true,
        loop: true,
        autoplay: false,
        responsive: {
            0: {items: 1},
            480: {items: 1},
            544: {items: 1},
            768: {items: 1},
            992: {items: 1},
            1200: {items: 1}
        }
    })

    $(".cart-list .well").on('click', '.shop_delete', function () {
        $(this).closest('.cart-list .well ul').remove();
    });

    $('.tree-toggle').click(function () {
        $(this).parent().children('ul.tree').toggle(200);
    });
    $(function () {
        $('.tree-toggle').parent().children('ul.tree').toggle(200);
    })


//    $(function () {


    if ($("select[name=shippingCountryID]").length > 0) {
        $("select[name=shippingCountryID]").trigger('change');
    }

    $('a.add').bind('click', function () {
        var qty = $(this).closest('.incdnc').find('.qty');
        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal)) {
            currentVal = currentVal + 1;
            qty.val(currentVal);
        }
        return false;
    });

    $('a.minus').bind('click', function () {
        var qty = $(this).closest('.incdnc').find('.qty');
        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            currentVal = currentVal - 1;
            qty.val(currentVal);
        }
        return false;
    });


    $(".coleql_height .search_product .product_wrap").hover(function (e) {
        e.preventDefault();
        $(".coleql_height .search_product").removeClass("active");
        $(this).closest('.coleql_height .search_product').addClass('active'); // I also tried .parent().addClass
    });

    $(".coleql_height .search_product .overlay").mouseleave(function (e) {
        e.preventDefault();
        $(".coleql_height .search_product").removeClass("active");
        $(this).closest('.coleql_height .search_product').removeClass('active'); // I also tried .parent().addClass
    });


    $(".coleql_height .pro_related .product_wrap").hover(function (e) {
        e.preventDefault();
        $(".coleql_height .pro_related").removeClass("active");
        $(this).closest('.coleql_height .pro_related').addClass('active'); // I also tried .parent().addClass
    });

    $(".coleql_height .pro_related .overlay").mouseleave(function (e) {
        e.preventDefault();
        $(".coleql_height .pro_related").removeClass("active");
        $(this).closest('.coleql_height .pro_related').removeClass('active'); // I also tried .parent().addClass
    });


    function reposition() {
        var modal = $(this),
        dialog = modal.find('.modal-custom');
        //modal.css('display', 'block');
        // Dividing by two centers the modal exactly, but dividing by three
        // or four works better for larger screens.
        dialog.css("margin-top", (Math.max(0, (($(window).height() - dialog.height()) / 2) - 150 )));
        $('#menuModal').modal('hide');
//        $('button.navbar-toggler').removeClass('active');
    }

    // Reposition when a modal is shown
    $('.modal').on('show.bs.modal', reposition);
    

    // Reposition when the window is resized
    $(window).on('resize', function () {
        $('.modal:visible').each(reposition);
    });

    /***************Remove giỏ hàng *******************/
    $(".cart-list .well").on('click', '.shop_delete', function (e) {
        e.preventDefault();
        $(this).closest("ul").remove();
        link = $(this).attr('data-link');
        var res = $(this).attr('id').split("_");
        var id = res[1];
        $.ajax({
            type: 'post',
            url: link,
            data: 'id=' + id,
            dataType: 'json',
            success: function (m) {
//                    $("#floatCatItems").html(m.data);
                $("#floatTotal").html(m.cost);
                $("#cartcounter").html('(' + m.quantity + ')');
            }
        });
        return false;
    });


    /**************Add giỏ hàng  ********************/

    $(".addToCart").click(function (e) {
        e.preventDefault();

        ccf = true;
        link = $(this).attr('data-link');
        var res = $(this).attr('id').split("_");
        var id = res[1];
        var qty = $('#qty_' + id).val();
        $.ajax({
            type: 'post',
            url: link,
            data: 'id=' + id + '&qty=' + qty,
            dataType: 'json',
            success: function (m) {
                console.log(m);
                $("#floatCatItems").html(m.data);
                $("#floatTotal").html(m.cost);
                $("#cartcounter").html('(' + m.quantity + ')');
                if (ccf) {
                    $("#cartdropdown").collapse('show');
                }

            }
        });
        return false;
    });

    $(".facebook-btn").click(function (e) {
        e.preventDefault();
        FB.login(function (response) {
            if (response.authResponse.userID) {
                $.ajax({
                    url: '/index.php',
                    data: 'mode=registerFacebookCustomer&jsonResponse=1&signed_request=' + response.authResponse.signedRequest,
                    dataType: 'json',
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        }, {scope: 'email,user_location'});
    });

    $("#login_form,#login_form_product").validationEngine('attach', {
        isOverflown: true,
        ajaxFormValidation: true,
        ajaxFormValidationMethod: 'post',
        onBeforeAjaxFormValidation: function (form, options) {
            $(".login_status").html($(".login_status").attr('data-wait')).removeClass('error');
        },
        onAjaxFormComplete: function (form, status, res, options) {
            if (res.loginStatus == "f") {
                $(".login_status").html($(".login_status").attr('data-fail')).addClass('error');
            } else if (res.loginStatus == "s") {
                location.reload();
            }
        }
    });
    $("#passRemForm,#passRemForm2").validationEngine('attach', {
        isOverflown: true,
        ajaxFormValidation: true,
        ajaxFormValidationMethod: 'post',
        onBeforeAjaxFormValidation: function (form, options) {
            $(".prm_status").html($(".prm_status").attr('data-wait'));
        },
        onAjaxFormComplete: function (form, status, res, options) {
            if (res.response == "s") {
                $(".prm_status").html($(".prm_status").attr('data-ok'));
            } else {
                $(".prm_status").html($(".prm_status").attr('data-fail'));
            }
        }
    });
    $("#regForm,#regForm2").validationEngine('attach', {
        isOverflown: true,
        ajaxFormValidation: true,
        ajaxFormValidationMethod: 'post',
        onBeforeAjaxFormValidation: function (form, options) {
            $(".reg_status").html($(".reg_status").attr('data-wait'));
        },
        onAjaxFormComplete: function (form, status, res, options) {
            if (res[0].response == "e") {
                $(".reg_status").html($(".reg_status").attr('data-taken'));
            } else if (res[0].response == "s") {
                location.reload();
            }
        }
    });
    $(".passForgot_ck").click(function (e) {
        e.preventDefault();
        $(".login_ckpage").slideUp('slow', function () {
            $(".passrem_ckpage").slideDown();
        });
    });

    $(".justValidate").validationEngine();

    $("#editShippingBtn").click(function (e) {
        e.preventDefault();
        $("#shippingInfForm").slideDown();
        $("#billing_part").addClass('d-none')
    })

    $("#shipMethod").change(function (e) {
        e.preventDefault();
        v = $(" :selected", this).val();
        c = $(" :selected", this).attr('data-currency');
        p = $(" :selected", this).attr('data-price');
        $("#shippingTotal").text(p);
        $.ajax({
            type: 'post',
            url: '/',
            dataType: 'json',
            data: {
                shippingMethod: v,
                json_response: 'yes'
            },
            success: function (m) {
                $("#grandTotalP").text(c + m.cartTotal);
                $("#shipDName").text($("#shipMethod :selected").text());
            }
        });
    });

    $("select[name=shippingCountryID]").change(function (e) {
        s = $(this).attr('data-sect');
        v = $(" :selected", this).val();
        $.ajax({
            type: 'post',
            url: '/indexAjax.php',
            data: {
                section: s,
                cntry: v
            },
            dataType: 'json',
            success: function (m) {
                $("#shipMethod option").remove();
                $.each(m, function (a, b) {
                    $("#shipMethod").append('<option value="' + b.id + '" data-price="' + b.currency + b.price + '" data-currency="' + b.currency + '">' + b.courier + ' ' + b.currency + b.price + '<\/option>');
                });
                $("#shipMethod").trigger('change');
            }
        })


        $("#saveShipping").click(function (e) {
            e.preventDefault();
            var errors = 0;
            var fields = ['fNameShipping', 'lNameShipping', 'phoneShipping', 'addressShipping', 'shippingCountryID', 'cityShipping', 'postalShipping'];
            $.each(fields, function (a, b) {
                v = $('[name="' + b + '"]').val();
                if (v.length == 0) {
                    errors++;
                    $('[name="' + b + '"]').parent().addClass('error');
                } else {
                    $('[name="' + b + '"]').parent().removeClass('error');
                }
            });

            if (errors == 0) {
                $("#shippingAddressPreview").html($("[name='fNameShipping']").val() + ' ' + $("[name='lNameShipping']").val() + ', ' + $("[name='addressShipping']").val() + ' ' + $("[name='address2Shipping']").val() + '<br />' + $("[name=stateIDShipping] :selected").text() + ' ' + $("[name=cityShipping]").val() + ' ' + $("[name=postalShipping]").val() + ' ' + $("[name=shippingCountryID] :selected").text());

                if ($("#shipTBil").prop('checked') == true) {
                    $("[name=fName]").val($("[name='fNameShipping']").val());
                    $("[name=lName]").val($("[name='lNameShipping']").val());
                    $("[name=address]").val($("[name='addressShipping']").val());
                    $("[name=address2]").val($("[name='address2Shipping']").val());
                    $("[name=city]").val($("[name='cityShipping']").val());
                    $("[name=postalCode]").val($("[name='postalShipping']").val());
                    $("[name=phone2]").val($("[name='phoneShipping']").val());
                    $("[name=countryID]").val($("[name='shippingCountryID'] :selected").val());
                }

                $("#shippingInfForm").slideUp();
                $("#billing_part").removeClass('d-none');
            }
        });

        $("#createPass").validationEngine('attach', {
            isOverflown: true,
            ajaxFormValidation: true,
            ajaxFormValidationMethod: 'post',
            onBeforeAjaxFormValidation: function (form, options) {

            },
            onAjaxFormComplete: function (form, status, res, options) {
                alert("Thank You!")
            }
        });

    });


//        $(".coupon_apply").click(function () {
//            $.ajax({
//                url: "/applyVirtualMoney.php",
//                data: 'cardNumber=' + $("#couponCode").val(),
//                type: 'POST',
//                context: this,
//                success: function (data) {
//                    var responseText;
//                    if (data == '-1') {
//                        responseText = $(".vmNumeric").text();
//                    } else if (data == '-2') {
//                        responseText = $(".exprdInvldCpn").text();
//                    } else if (data == '-3') {
//                        responseText = $(".cpnUsed").text();
//                    } else if (data == '-4' || data == -5) {
//                        responseText = $(".ilglCpnCde").text();
//                    } else if (data == '-6') {
//                        responseText = $(".cpnMinCrt").text();
//                    } else if (data == $("#couponCode").val()) {
//                        responseText = $(".plsWaitCpnBalance").html();
//                        getCouponDetails(data);
//                    }
//                    $("#couponStatus").html(responseText);
//                }
//            });
//        });

    function getCouponDetails(data) {
        $.ajax({
            url: "/applyVirtualMoney.php",
            data: 'mode=getCardBalance&cardNumber=' + data,
            type: 'POST',
            context: this,
            success: function (data) {
                if (data.indexOf('%') > -1) {
                    data = data.replace('%', '');
                    discountValue = parseFloat(jQuery("#discountval").attr('data-products')) * data / 100;
                } else {
                    discountValue = data.replace(jQuery("#discountval").attr('data-currency'), '');
                }

                if (parseFloat(data) > 0) {
                    jQuery("#discountval").text(jQuery("#discountval").attr('data-currency') + formatNumber(discountValue, 2, ",", ".", "", "", "", "", ""));
                    jQuery("#couponStatus").html('Coupon Applied to your cart');
                    jQuery("#couponCode").prop('readonly', true);
                } else {
                    jQuery("#couponStatus").html($(".cpnUsed").text());
                }
            }
        });
    }

//    });
    window.fbAsyncInit = function () {
        FB.init({appId: '366814993491980', xfbml: true, version: 'v2.2'});
    };
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
    (document, 'script', 'facebook-jssdk')
            );

    function formatNumber(num, dec, thou, pnt, curr1, curr2, n1, n2) {
        var x = Math.round(num * Math.pow(10, dec));
        if (x >= 0)
            n1 = n2 = '';
        var y = ('' + Math.abs(x)).split('');
        var z = y.length - dec;
        if (z < 0)
            z--;
        for (var i = z; i < 0; i++)
            y.unshift('0');
        if (z < 0)
            z = 1;
        y.splice(z, 0, pnt);
        if (y[0] == pnt)
            y.unshift('0');
        while (z > 3) {
            z -= 3;
            y.splice(z, 0, thou);
        }
        var r = curr1 + n1 + y.join('') + n2 + curr2;
        return r;
    }

}