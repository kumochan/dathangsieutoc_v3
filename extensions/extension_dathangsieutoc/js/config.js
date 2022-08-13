var service_host,
    add_to_cart_url,
    add_to_cart_action,
    cart_url,
    catalog_scalar_url,
    isTranslate,
    link_detail_cart,
    add_to_favorite_url,
    add_to_favorite_action,
    button_add_to_cart_url,
    secret_key,
    css_url;

var site_using_https = false;
// var site_using_https = true;

chrome.storage.sync.get({
    domain: site_using_https ? 'https://taobao1688.balota.vn/' : 'http://taobao1688.balota.vn/',
    is_translate: true
}, function(items) {

    var value = items.domain;

    if(site_using_https && items.domain.search("https") == -1){
        value = items.domain.replace("http", "https");
    }

    if(!site_using_https && items.domain.search("https") != -1){
        value = items.domain.replace("https", "http");
    }

    chrome.storage.sync.set({
        domain: value
    }, function() {

    });

    service_host = value;

    //============================================================

    secret_key = 'uAH7sBDD7FNbdENg2RbydXhEzR2VxiV3dbLjHldqOD4='
    isTranslate = items.is_translate;
    add_to_cart_url = service_host+ 'Api/ExtensionApi.ashx';
    add_to_cart_action = 'add_cart';
    cart_url = service_host+'checkout';
    link_detail_cart = service_host + "gio-hang";
    add_to_favorite_url = service_host + "Api/ExtensionApi.ashx";
    add_to_favorite_action = 'save_product';
    button_add_to_cart_url = service_host + "assets/images/add_on/icon-bkv1-small.png";
    catalog_scalar_url = service_host+ 'Api/ExtensionApi.ashx';
    css_url = 'css/cn_main.css';

    // var css_url = '';
    // switch (items.domain){
    //     case 'http://cn.seudo.vn/':
    //         catalog_scalar_url = 'http://cnlogistic.seudo.vn/api/catalog/scalar';
    //         css_url = 'css/cn_main.css';
    //         break;
    //     default :
    //         css_url = 'css/main.css';
    //         catalog_scalar_url = 'http://logistic.seudo.vn/api/catalog/scalar';
    //         break;
    // }

    if(css_url){
        var NewStyles = document.createElement("link");
        NewStyles.rel = "stylesheet";
        NewStyles.type = "text/css";
        NewStyles.href = chrome.extension.getURL(css_url);
        document.head.appendChild(NewStyles);
    }
});

var translate_url = 'http://seudo.vn/i/goodies_util/translate';
var isUsingSetting = false;
var translate_keyword_url = "";
var version_tool = "1.00.00";
var exchange_rate;
var web_service_url = "http://taobao1688.balota.vn/Api/ExtensionApi.ashx";
var exchange_rate_url = 'http://taobao1688.balota.vn/Api/ExtensionApi.ashx';
