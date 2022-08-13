if (window.location.hostname === 'item.taobao.com') {
    let domain_api = 'hhttp://127.0.0.1:8000/api/';
    let domain = 'http://127.0.0.1:8000/';
    let exchange_rate = 3.5;
    /**
     * khoi tao giá trị khi load trang
     */
    let product_id = Math.floor(Math.random() * 100000000000000); // random productId
    //lay ten shop
    let shop_name = $('.tb-shop-name a').attr('title') || $('.shop-name-link').text().trim();

    //lay gia san pham
    let product_price = $('.tb-rmb-num').text();

    // function open dathangsieutoc to login
    function openLogin() {
        window.open(domain + "backyard/login", "_blank");
    }

    /*** CREATE HTML*/

    function createHTML(product_price, exchange_rate, product_id) {
        create_1688_info_box(product_price, exchange_rate, product_id);
        create_1688_button_add(); 
    }

    //tao  button + box info
    function create_1688_info_box(product_price, exchange_rate, product_id) {
        let info_box = `
        <div class = "info">
            <img class = "logo-image-dhst" src="https://dathangsieutoc.com/frontend/assets/images/logo/dhst.png" alt="Logo">
            <div class="box-info">
                <ul>
                    <li>
                        <lable>Giá bán: </lable>
                        <span class="right"><b class="tbe-rate money_type">` + product_price + `</b> tệ</span>
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
        $source = $('.tb-main-title');
        $source.after(info_box);
    }

    function create_1688_button_add() {
        let button_add = `
        <div class="dat-hang">
            <div class ="container">
                <p class ="warning"> Lưu ý: Không sử dụng chức năng dịch ngôn ngữ của google khi thao tác đặt hàng</p>
                <a href="javascript:;" id="sp_order_9123" class="button button-large button-important custom_btn_click">Thêm vào giỏ hàng</a>
            </div>
        </div>`;
        $('#J_isku').append(button_add);
    }
    // lấy exchangerate
    // api get exchange rate
    $.ajax({
        url: domain_api + "option/getexchangerate",
        type: "GET",
        success: function (data) {
            exchange_rate = data;
            createHTML(product_price, exchange_rate, product_id);
        }
    });
    $(document).ready(function () {
        chrome.storage.sync.get(['token', 'user_id', 'csrf_token'], function(items) {
            // luu bien token
            let token = items.token;
            let user_id = items.user_id;
            let csrf_token = items.csrf_token;
            // LOGIC dat hang
            let order = {};
            order["type"] = "order";
            order["product"] = [];
            order['user_id'] = user_id;
            //create and push product to order
            function getValue(total_price, total_product, type) {
                let product = {};
                let image = '';
                if(type['image'] != null) {
                    image = type['image'][1];
                }
                product["image_link"] = image;
                product["number"] = total_product;
                product["name"] = $('.tb-main-title').data('title');
                product["detail_price_cn"] = product_price;
                product["detail_total_price_cn"] = total_price;
                product["size"] = type['size'];
                product["color"] = type['color'];
                order["product"].push(product);
            }
            $(".custom_btn_click").click(function() { console.log(123);
                if(typeof token == 'undefined') {
                    openLogin();
                }
                //lấy thông tin sản phẩm (ảnh , kích cỡ , ...)
                let type = [];
                if($('.tb-img .tb-selected a').length == 0) {
                    alert('vui lòng chọn 1 sản phẩm');
                    return false;
                } else {
                    type['image'] = $('.tb-img .tb-selected a').css("background").match(/url\(\"(.*)\"\)/);
                    type['color'] = $('.tb-img .tb-selected a span').text() || '';
                }
                if($('.J_Prop_measurement .tb-selected a span').length == 0) {
                    alert('vui lòng chọn kích cỡ');
                    return false;
                } else {
                    type['size'] = $('.J_Prop_measurement .tb-selected a span').text() || '';
                }
                let total_product = $('#J_IptAmount').val();
                let total_price = (product_price * total_product).toFixed(2);
                getValue(total_price, total_product, type);
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
                        'X-CSRF-Token': csrf_token,
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