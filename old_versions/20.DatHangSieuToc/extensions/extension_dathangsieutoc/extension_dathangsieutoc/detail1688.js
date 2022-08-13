if (window.location.hostname === 'detail.1688.com') {
    let domain_api = 'http://127.0.0.1:8000/api/';
    let domain = 'http://127.0.0.1:8000/';
    let exchange_rate = 3.5;
    /**
     * khoi tao giá trị khi load trang
     */
    let product_id = Math.floor(Math.random() * 100000000000000); // random productId stop here
    let shop_name = $('.shop-info .company-name').attr('title'); // ten shop
    if(typeof shop_name == 'undefined') {
        shop_name = 'custom_shop_name';
    }
    let product_price = '';
    if ($('.price-original-sku').length > 0) {
        let array_price = [];
        $('.price-original-sku').find('.value').each(function () {
            array_price.push(`<span class = "money_type">` + Math.round($(this).text() * exchange_rate * 1000 * 100) / 100 + `</span>` + 'đ'); //quy doi sang tien viet neu co the
        });
        product_price = array_price.join(' ~ ');
    } if ($('.price-val .price-num').length > 0) {
        product_price = $('.price-val .price-num').text();
        product_price = Math.round(product_price * exchange_rate * 1000 * 100) / 100
    } else {
        product_price = $('.price-now').text();
        product_price = Math.round(product_price * exchange_rate * 1000 * 100) / 100
    }
    // lấy exchangerate
    chrome.storage.sync.get(['token', 'user_id'], function(items) {
        // luu bien token
        let token = items.token;
        // api get exchange rate
        $.ajax({
            url: domain_api + "option/getexchangerate",
            type: "GET",
            headers: {
                'withCredentials': true,
                'crossDomain': true,
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + token
            },
            success: function (data) {
                exchange_rate = data;
                createHTML(product_price, exchange_rate, product_id);
            }, error: function(data) {
                openLogin();
            }
        });
    });
    // function open dathangsieutoc to login
    function openLogin() {
        window.open(domain + "backyard/login", "_blank");
    }

    /**
     * CREATE HTML
     */

    function createHTML(product_price, exchange_rate, product_id) {
        if (window.location.hostname === 'detail.1688.com') {
            create_1688_info_box(product_price, exchange_rate, product_id);
            create_1688_button_add(); 
        } else {
            console.log('other');
        }
    }

    //tao  button + box info
    function create_1688_info_box(product_price, exchange_rate, product_id) {
        let info_box = `
        <div class = "info" data-spm-anchor-id="a261y.7663282.autotrace-offerDetailContext1.i2.72856c12NeuRh1">
        <img src="//nguonhang24h.vn/images/logo.png" alt="Logo">
        <div class="box-info">
        <ul>
        <li>
        <lable>Giá bán: </lable>
        <span class="right"><b class="tbe-rate money_type">` + product_price + `</b></span>
        </li>
        <li>
        <lable>Giá tệ: </lable>
        <span class="right"><b class="tbe-rate">` + exchange_rate + `</b></span> đ/tệ
        </li>
        <li>
        <lable>Mã sản phẩm: </lable>
        <span><b class="color-blue">` + product_id + `</b></span>
        </li>
        </ul>
        </div>
        </div>`;
        // $('.obj-price').closest('div .mod-detail-info-price').append(info_box);
        if ($('.offerdetail_ditto_price').length > 0) {
            $source = $('.offerdetail_ditto_price');
        } else {
            $source = $('.price-container').closest('.widget-custom');
        }
        $source.find('.widget-custom-container').append(info_box);
    }

    function create_1688_button_add() {
        let button_add = `
        <div class="dat-hang">
        <div class ="container">
        <p class ="warning"> Lưu ý: Không sử dụng chức năng dịch ngôn ngữ của google khi thao tác đặt hàng</p>
        <input type="submit" id="sp_order_912" class="button button-large button-important button_order" value = "Thêm vào giỏ hàng">
        </div>
        </div>`;
        if ($('.obj-order').length > 0) {
            $('.obj-order').closest('div .widget-custom div').append(button_add);
        } else {
            $('.dpl-box-content').closest('div .widget-custom div').append(button_add);
        }

    }

// khoi tao gia tri cua tung san pham moi khi nhan tang, giam.
    var detail_price_array = [];
    function createArray(row) {
        detail_name = row.closest('tr').find('.name span').attr('title');
        if(typeof detail_name == 'undefined') {
            var detail_name = row.closest('tr').find('.name span').text();  
        }
        var detail_price = row.closest('tr').find('.price .value').text();
        var order_name = $('.list-leading').find('.selected').attr('title');
        if (order_name != undefined) {
            if (detail_price_array[order_name] == undefined) {
                detail_price_array[order_name] = [];
            }
            detail_price_array[order_name][detail_name] = detail_price;
        } else {
            detail_price_array[detail_name] = detail_price;
        }
    }

    $(document).ready(function () {
        $('.amount-up').click(function () {
            createArray($(this));
        });
        $('.amount-down').click(function () {
            createArray($(this));
        });
        chrome.storage.sync.get(['token', 'user_id'], function(items) {
                // luu bien token
            let token = items.token;
            let user_id = items.user_id;
            /**
             * LOGIC dat hang
             */
            let order = {};
            order["type"] = "order";
            order["product"] = [];
            order['user_id'] = user_id;
            //create and push product to order
            function getValue(row, array_price) {
                var img_alt = row.find('.prop').text();
                var img_link = $('img[alt="' + img_alt + '"]').attr('src') || '';
                row.find('.desc li').each(function () {
                    let product = {};
                    var data = $(this).data('sku-config');
                    var detail_price = 0;
                    if (array_price[img_alt][data.skuName] != undefined) {
                        detail_price = array_price[img_alt][data.skuName];
                    } else {
                        detail_price = array_price[img_alt];
                    }
                    detail_price = parseFloat(detail_price);
                    var detail_number = parseFloat(data.amount);
                    product["image_link"] = img_link;
                    product["number"] = detail_number;
                    product["name"] = data.skuName;
                    product["detail_price_cn"] = detail_price.toFixed(2);
                    product["detail_total_price_cn"] = (detail_price * detail_number).toFixed(2);
                    order["product"].push(product);
                });
            }
            $("#sp_order_912").click(function () {
                $('.list-info table tr').each(function () {
                    getValue($(this), detail_price_array);
                });
                let total_product = $('.obj-list').find('.list-total .amount .value').text(); // tong so luong san pham
                let total_price = Math.round($('.obj-list').find('.price .value').text() * 100) / 100;   //tong so tien
                order["attributes"] = {
                    "shop_name": shop_name,
                    "shop_id": product_id,
                    "price_cn": total_price,
                    "number_order": total_product
                };
                console.log(order);
                $.ajax({
                    url: domain_api + "order/add-order",
                    type: "POST",
                    headers: {
                        'withCredentials': true,
                        'crossDomain': true,
                        "Content-Type": "application/json",
                        'Authorization': 'Bearer ' + token
                    },
                    data: JSON.stringify(order),
                    success: function (data) {
                        location.reload();
                    }, error: function (result) {
                        alert('có lỗi trong quá trình thêm sản phẩm')
                    }
                });
            });
        });
    });
}