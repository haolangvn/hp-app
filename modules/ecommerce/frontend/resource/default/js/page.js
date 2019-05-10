/**
 * Các khai báo khi xử dụng
 * 
 * --- Link API
 * @api_filter  : tag <span id="ap_url-filter" data-href="..." class="hidden">#</span>
 * @api_reload  : tag <span id="ap_url-reload" data-href="..." class="hidden">#</span>
 * 
 * --- Html Code Demo
 * <div>
 *      <form id="ap_filter-form">
 *          Data submit hiển thị trong url => Required
 *      </form>
 *      <a class="ap_filter-a">
 *          Ajax Link => Option
 *      </a>
 *      <span class="ap_hidden-data" data-key="" data-value="">
 *          Data hidden kg hiển thị trong url => Option
 *      </span>
 * </div>
 ***** Required
 * <div id="ap_grid-reload">
 *      <span class="ap_filter-elements">...</span>
 *      <select id="ap_sort-contrlor">...</select>
 * </div>
 ***** Required
 * <div id="ap_grid-data">
 *      <div id="ap_grid-page">
 *          <a id="ap_btn-more">...</a>
 *      </div>
 * </div>
 * 
 * --- Các addone jquery kèm theo
 * Lazy Load
 * Popup overlay
 */

function init() {

    api_filter = $('#ap_url-filter');
    api_reload = $('#ap_url-reload');

    grid_reload = $('#ap_grid-reload');
    grid_page = $('#ap_grid-page');
    grid_data = $('#ap_grid-data');


    form = $('form#ap_filter-form');
    a = $('a.ap_filter-a');
    hidden_data = $('span.ap_hidden-data');

    btn_page = $('#ap_btn-more');
    sort_control = $('#ap_sort-control');
    element = $('.filter-elements');

    form.on('submit', function () {
        Filter();
        return false;
    });
    form.find('select').on('change', function () {
        Filter();
    });
    a.bind('click', function () {
        var arr = ParseURI($(this).attr('href').replace(/^#/, ''));
        ReloadFilterForm(arr);
        Filter();
    });
}

var hash = location.hash.substring(1);
var api_filter, api_reload;
var grid_reload, grid_page, grid_data;
var form, btn_page, sort_control, element, a, hidden_data;

init();
// Phân trang Jquery Ajax
function Filter(pagination = 0) {

    var params = GetDataForm();

    if (pagination) {
        var num = btn_page.attr('data-page') * 1;
        params.push({name: 'page', value: num});
    }

    if (sort_control.length && sort_control.val() != '') {
        params.push({name: 'sort', value: sort_control.val()});
    }

//    console.log(params);
    if (params.length) {
        var uri = $.param(params);
        uri = uri.replace(/[^&]+=\.?(?:&|$)/g, '').replace(/&$/, '');

        location.href = api_filter.attr('data-current') + '#' + uri;
        LoadData(uri);
    }
    return;
}

// Xử lý filter data
function LoadData(params) {
    if (RequestRunning()) {
        return false;
    }
    RequestRunning(true);

    hidden_data.each(function () {
        var value = $(this).attr('data-value');
        if (value !== '') {
            params += '&' + $(this).attr('data-key') + '=' + value;
        }
    });

    console.log('Call AJAX with params : ' + params);
    if (api_filter.length) {
        $.ajax({
            url: api_filter.attr('data-href'),
            data: params,
            method: 'post',
            beforeSend: function () {
                $.LoadingOverlay('show');
            },
            success: function (html) {
                if (html === '') {
                    $(window).data('Forbidden', true);
                }
                if (params.search('page') > -1) {
                    grid_page.replaceWith(html);
                } else {
                    grid_data.html(html);
                }
                Reload(params);
            }
        }).done(function () {
            LazyLoad();
        }).fail(function (jqXHR, textStatus) {
            $(window).data('Forbidden', true);
            console.log(jqXHR);
        }).always(function () {
            RequestRunning(false);
            init();
            $.LoadingOverlay('hide');
        });
    }

    return true;
}

// Reload thông tin filter data
function Reload(params) {
    if (api_reload.length) {
        $.ajax({
            url: api_reload.attr('data-href'),
            data: params,
            method: 'post',
            beforeSend: function () {},
            success: function (html) {
                grid_reload.replaceWith(html);
            }
        }).done(function () {
        }).fail(function (jqXHR, textStatus) {
            console.log(jqXHR);
        }).always(function () {
            init();
        });
    }
    return false;
}

// Kiểm tra xử lý double request. 
function RequestRunning(request = '') {
    if (request === '') {
        return $(window).data('RequesRunning');
    } else {
        $(window).data('RequesRunning', request);
}
}

function ParseURI(strParams) {
//    var uri = decodeURI(strParams.replace(/#/g, ''));
    var uri = decodeURI(strParams);
    var chunks = uri.split('&');
    var params = Object();

    for (var i = 0; i < chunks.length; i++) {
        var chunk = chunks[i].split('=');
        if (chunk[0].search("\\[\\]") !== -1) {
            if (typeof params[chunk[0]] === 'undefined') {
                params[chunk[0]] = [chunk[1]];

            } else {
                params[chunk[0]].push(chunk[1]);
            }


        } else {
            params[chunk[0]] = chunk[1];
        }
    }
    return params;
}

function GetDataForm() {
    return form.serializeArray();
    return form.serialize().replace(/[^&]+=\.?(?:&|$)/g, '');
}

function ReloadFilterForm(arr) {
    var f = document.getElementById(form.attr('id'));
    for (var i = 0; i < f.length; i++) {
        if(f[i].type.toLowerCase() === 'hidden' ){
            f[i].value = '';
        }
    }
    
    $.each(arr, function (index, value) {
        form.find('[name="' + index + '"]').val(value);
    });
}

function ResetFilter() {
    var f = document.getElementById(form.attr('id'));
    element.remove();
    for (var i = 0; i < f.length; i++) {
        var t = f[i].type.toLowerCase();
        switch (t)
        {
            case "text":
            case "password":
            case "textarea":
            case "hidden":
                f[i].value = "";
                break;
            case "radio":
            case "checkbox":
                if (f[i].checked)
                {
                    f[i].checked = false;
                }
                break;
            case "select-one":
            case "select-multi":
                f[i].selectedIndex = 0;
                break;
            default:
                break;
        }
    }
    Filter();
}

function RemoveFilter(item) {
    item.parentElement.remove();
    var e = document.getElementsByName(item.getAttribute('data-key'))[0];
    var t = e.type.toLowerCase();
    switch (t)
    {
        case "text":
        case "password":
        case "textarea":
        case "hidden":
            e.value = '';
            break;
        case "radio":
        case "checkbox":
            e.checked = false;
            break;
        case "select-one":
        case "select-multi":
            e.selectedIndex = 0;
            break;
        default:
            break;
    }

    Filter();
}

if (hash) {
    init();
    var arr = ParseURI(hash);
    var params = hash.replace('page=' + arr.page, '');
    var timeout;
    var page = 1;

    AutoLoad(params, arr);
    function AutoLoad(params, arr) {
        timeout = setTimeout(function () {
            LoadData(params);
            page++;
            if ($(window).data('Forbidden')) {
                clearTimeout(timeout);
                $.LoadingOverlay('hide');
                return;
            }
            if (page <= arr.page) {
                params = hash.replace('page=' + arr.page, 'page=' + page);
                AutoLoad(params, arr);
            } else {
                clearTimeout(timeout);
                delete arr.page;
                delete arr.sort;
                ReloadFilterForm(arr);
            }
        }, 500);
    }
}

// JQuery Lazy Plugin
function LazyLoad() {
    $("img.lazy").lazyload({
        effect: "fadeIn"
    });
}