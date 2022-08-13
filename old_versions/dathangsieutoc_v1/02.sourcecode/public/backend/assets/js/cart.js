$(document).ready(function () {
    let array_checkbox = [];
    let array_checked = [];
    $('#check_all_shop').prop('checked', 'checked');
    $('.selectedShop').each(function () {
        $(this).prop('checked', 'checked');
        checkProduct($(this));
    });
    $('.selected_product').each(function () {
        $(this).prop('checked', 'checked');
    });
    $('#check_all_shop').click(function () {
        var checked = $(this).prop('checked');
        $('.selectedShop').each(function () {
            $(this).prop('checked', checked);
            checkProduct($(this));
            var selectedShop = $(this);
            $(this).closest('form').find('.selected_product').each(function () {
                setTotal($(this), selectedShop);
                setHeaderValueAfterCheckboxChange($(this));
            });
        });
    });

    $('.selectedShop').change(function () {
        var selectedShop = $(this);
        $(this).closest('form').find('.selected_product').each(function () {
            setTotal($(this), selectedShop);
            setHeaderValueAfterCheckboxChange($(this));
        })
        checkProduct($(this));
    });

    $('.selected_product').change(function () {
        setTotal($(this));
        setHeaderValueAfterCheckboxChange($(this));
        setValueToEachProduct($(this));
    });

    $('.btn-submit-all').click(function () {
        var submit_all = false;
        var not_check_anything = false;
        $('.selected_product').each(function () {
            if ($(this).prop('checked') == true) {
                not_check_anything = true;
                return false;
            }
        });
        if (!not_check_anything) {
            alert("bạn phải chọn ít nhất một sản phẩm");
        }
        $('.submit_order').each(function () {
            $(this).closest('form').find('.selected_product').each(function () {
                if ($(this).prop('checked') == true) {
                    submit_all = true;
                    return false;
                }
            });
            if (submit_all) {
                addOrder($(this));
            }
        });
    });

    $('.submit_order').click(function () {
        var submit_all = false;
        $(this).closest('form').find('.selected_product').each(function () {
            if ($(this).prop('checked') == true) {
                submit_all = true;
                return false;
            }
        });
        if (submit_all) {
            addOrder($(this));
        } else {
            alert("bạn phải chọn ít nhất một sản phẩm");
        }
    });

    $('.product_type_hidden').each(function () {
        let check = $(this).val();
        check = check.replace(/\s+/g, '');
        let checked = check.split(',');
        array_checked.push(checked);
    });
    // create array checkbox
    $.each(array_checked, function (index, value) {
        let array_key = index + 1;
        let value1 = 'product_type_' + array_key + '_1';
        let value2 = 'product_type_' + array_key + '_2';
        let value3 = 'product_type_' + array_key + '_3';
        array_checkbox[index] = {
            1: value1,
            2: value2,
            3: value3
        };
    });

    $.each(array_checkbox, function (index, value) {
        $.each(value, function (index2, value2) {
            if (array_checked[index].indexOf(index2.toString()) != -1) {
                $('#' + value2).prop('checked', true);
            }
        });
    });
    //set header value
    let total_shop = 0;
    let total_product = 0;
    let all_price_cn = 0;
    let all_price_vn = 0;
    $('[name="order_info"]').each(function () {
        total_shop++;
        total_product += parseFloat($('.total_number_' + $(this).val()).text());
        all_price_cn += parseFloat($('[name="update_price_cn_' + $(this).val() + '"]').val());
        all_price_vn += parseFloat($('[name="update_price_vn_' + $(this).val() + '"]').val());
    });
    setHeaderValue(total_shop, total_product, all_price_cn, all_price_vn);
    // them dau , vao tien
    $('[name="order_info"]').each(function () {
        let update_price_cn = $('[name="update_price_cn_' + $(this).val() + '"]').val();
        let update_price_vn = $('[name="update_price_vn_' + $(this).val() + '"]').val();
        let new_text = changeNumberType(update_price_cn) + " ¥ = " + changeNumberType(update_price_vn) + " đ";
        $('.total_price_' + $(this).val()).text(new_text);
        let order_detail_info = $(this).closest('form').find('.order_detail_info');
        order_detail_info.each(function () {
            let current_price_vn = $('.current_price_vn_' + $(this).val());
            let current_price_cn = $('.current_price_cn_' + $(this).val());
            let current_total_price_vn = $('.current_total_price_vn_' + $(this).val());
            let current_total_price_cn = $('.current_total_price_cn_' + $(this).val());
            current_price_vn.text(changeNumberType(current_price_vn.text()));
            current_price_cn.text(changeNumberType(current_price_cn.text()));
            current_total_price_vn.text(changeNumberType(current_total_price_vn.text()));
            current_total_price_cn.text(changeNumberType(current_total_price_cn.text()));
        });
    });

    $('.number_add').change(function () {
        if ($(this).val() != '' && $(this).val() >= 0) {
            let checkedCheckbox = $(this).closest('tr').find('.selected_product').prop('checked');
            let all_number_add = $(this).closest('form').find('.number_add');
            let new_total = 0;
            let current_number_add = $(this).attr('name');
            all_number_add.each(function () {
                if (current_number_add == $(this).attr('name') && !checkedCheckbox) {
                    return;
                }
                new_total += parseFloat($(this).val());
            });
            let order_info = $(this).closest('form').find('[name="order_info"]').val();
            let order_detail_info = $(this).closest('form').find('.order_detail_info');
            let current_price_vn; // số tiền 1 sản phẩm (tệ)
            let current_price_cn; // số tiền 1 sản phẩm (vnđ)
            let new_price_cn; // tổng số tiền tệ mới (số tiền 1sp * sl sp)
            let new_price_vn; // tổng số tiền vnđ mới (số tiền 1sp * sl sp)
            let current_number; // số lượng sản phẩm hiện tại
            let total_price_cn = 0; // tổng số tiền tệ trong order
            let total_price_vn = 0; // tổng số tiền vnđ trong order
            order_detail_info.each(function () {
                current_price_cn = $(this).closest('tr').find('.current_price_cn_' + $(this).val()).text();
                current_price_vn = $(this).closest('tr').find('.current_price_vn_' + $(this).val()).text();
                current_price_cn = parseFloat(current_price_cn.replace(',', ''));
                current_price_vn = parseFloat(current_price_vn.replace(',', ''));
                current_number = parseFloat($(this).closest('tr').find('.number_add').val());
                new_price_cn = parseFloat(current_number) * (current_price_cn);
                new_price_vn = parseFloat(current_number) * (current_price_vn);
                let number_add = $(this).closest('tr').find('.number_add').attr('name');
                changeTotalPrice(new_price_cn, new_price_vn, order_info, $(this).val());
                if (current_number_add == number_add && !checkedCheckbox) {
                    return;
                }
                total_price_cn += new_price_cn;
                total_price_vn += new_price_vn;
            });
            changeTotalNumber(new_total, order_info);
            // chi sua tong so luong khi ma checkbox duoc check
            $('.total_price_' + order_info).text(changeNumberType(total_price_cn) + ' ¥ = ' + changeNumberType(total_price_vn) + ' đ');
            $('[name="update_price_cn_' + order_info + '"]').val(total_price_cn);
            $('[name="update_price_vn_' + order_info + '"]').val(total_price_vn);
        }
    });

    //reload header khi thay doi thong so
    $('.number_add').change(function () {
        if ($(this).val() != '' && $(this).val() >= 0) {
            // khoi tao lai gia tri khi thay doi
            let checkedCheckbox = $(this).closest('tr').find('.selected_product');
            if (checkedCheckbox.prop('checked') == true) {
                let order_info = $('[name="order_info"]');
                let total_product1 = 0;
                let all_price_cn1 = 0;
                let all_price_vn1 = 0;
                order_info.each(function () {
                    total_product1 += parseFloat($('.total_number_' + $(this).val()).text());
                    all_price_cn1 += parseFloat($('[name="update_price_cn_' + $(this).val() + '"]').val());
                    all_price_vn1 += parseFloat($('[name="update_price_vn_' + $(this).val() + '"]').val());
                    setHeaderValue(total_shop, total_product1, all_price_cn1, all_price_vn1);
                });
            }
        }
    });

    function changeTotalNumber(new_total, order_info) {
        $('.total_number_' + order_info).text(new_total);
        $('[name="update_number_' + order_info + '"]').val(new_total);
    }
    
    function changeTotalPrice(new_price_cn, new_price_vn, order_info, order_detail_info) {
        $('.current_total_price_cn_' + order_detail_info).text(changeNumberType(new_price_cn));
        $('.current_total_price_vn_' + order_detail_info).text(changeNumberType(new_price_vn));
        $('[name="detail_total_price_cn_' + order_detail_info + '"]').val(new_price_cn);
        $('[name="detail_total_price_vn_' + order_detail_info + '"]').val(new_price_vn);
    }
    
    function setHeaderValue(total_shop, total_product, all_price_cn, all_price_vn) {
        $('.total_shop').text(total_shop);
        $('.total_product').text(total_product);
        $('.all_price_cn').text(changeNumberType(all_price_cn));
        $('.all_price_vn').text(changeNumberType(all_price_vn));
    }
    
    function changeNumberType(number, decimalCount = 2, decimal = ".", thousands = ",") {
        try {
          decimalCount = Math.abs(decimalCount);
          decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
      
          const negativeSign = number < 0 ? "-" : "";
      
          let i = parseInt(number = Math.abs(Number(number) || 0).toFixed(decimalCount)).toString();
          let j = (i.length > 3) ? i.length % 3 : 0;
      
          return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(number - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
          console.log(e)
        }
    };
    
    function addOrder(objButton) {
        let form_id = objButton.attr('data-id');
        $('#' + form_id).submit();
    }
    
    function checkProduct(parentCheckbox) {
        var productChecked = parentCheckbox.prop('checked');
        parentCheckbox.closest('form').find('.selected_product').each(function () {
            $(this).prop('checked', productChecked);
            setValueToEachProduct($(this));
        });
    }
    
    function setValueToEachProduct(checkbox) {
        checkbox.closest('th').find('.array_product').val('');
        if (checkbox.prop('checked') == true) {
            var productId = checkbox.attr('id').split("_")[1];
            checkbox.closest('th').find('.array_product').val(productId);
        }
    }
    
    /**
     *
     * **/
    function setTotal(checkbox, checkboxShopFlag = '') {
        var order_info = checkbox.closest('form').find('[name="order_info"]').val();
    
        // get data to update number
        var number_add = checkbox.closest('tr').find('.number_add');
        if (number_add.val() != '' && number_add.val() >= 0) {
            var update_number = checkbox.closest('form').find('[name="update_number_' + order_info + '"]');
            var total_number = checkbox.closest('form').find('.total_number_' + order_info)
            // get data to update price
            var total_price_cn = checkbox.closest('tr').find('.total_price_cn');
            var total_price_vn = checkbox.closest('tr').find('.total_price_vn');
            var update_total_price_cn = checkbox.closest('form').find('[name="update_price_cn_' + order_info + '"]');
            var update_total_price_vn = checkbox.closest('form').find('[name="update_price_vn_' + order_info + '"]');
            var total_price_lable = checkbox.closest('form').find('.total_price_' + order_info);
            if (checkboxShopFlag != '') {
                if (checkboxShopFlag.prop('checked') == false) {
                    total_number.text(0);
                    update_number.val(0);
                    update_total_price_cn.val(0);
                    update_total_price_vn.val(0);
                    total_price_lable.text(changeNumberType(0) + ' ¥ = ' + changeNumberType(0) + ' đ');
                    return false;
                }
            }
            if (checkbox.prop('checked') == true || (checkboxShopFlag != '' && checkboxShopFlag.prop('checked') == true)) {
                // update number
                var new_update_number = parseFloat(update_number.val()) + parseFloat(number_add.val());
                // update price
                var new_update_price_cn = parseFloat(update_total_price_cn.val()) + parseFloat(total_price_cn.val());
                var new_update_price_vn = parseFloat(update_total_price_vn.val()) + parseFloat(total_price_vn.val());
            } else {
                // update number
                var new_update_number = parseFloat(update_number.val()) - parseFloat(number_add.val());
                // update price
                var new_update_price_cn = parseFloat(update_total_price_cn.val()) - parseFloat(total_price_cn.val());
                var new_update_price_vn = parseFloat(update_total_price_vn.val()) - parseFloat(total_price_vn.val());
            }
            total_number.text(new_update_number);
            update_number.val(new_update_number);
            update_total_price_cn.val(new_update_price_cn);
            update_total_price_vn.val(new_update_price_vn);
            total_price_lable.text(changeNumberType(new_update_price_cn) + ' ¥ = ' + changeNumberType(new_update_price_vn) + ' đ');
        }
    }
    
    function setHeaderValueAfterCheckboxChange(checkbox) {
        var total_shop = $('.total_shop').text();
        console.log(total_shop);
        var number_add = checkbox.closest('tr').find('.number_add');
        if (number_add.val() != '' && number_add.val() >= 0) {
            // khoi tao lai gia tri khi thay doi
            let order_info = $('[name="order_info"]');
            let total_product1 = 0;
            let all_price_cn1 = 0;
            let all_price_vn1 = 0;
            order_info.each(function () {
                total_product1 += parseFloat($('.total_number_' + $(this).val()).text());
                all_price_cn1 += parseFloat($('[name="update_price_cn_' + $(this).val() + '"]').val());
                all_price_vn1 += parseFloat($('[name="update_price_vn_' + $(this).val() + '"]').val());
            });
            setHeaderValue(total_shop, total_product1, all_price_cn1, all_price_vn1);
        }
    }
    
});