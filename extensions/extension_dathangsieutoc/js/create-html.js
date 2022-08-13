function create1688(){
    // tao div info
    var div_info = document.createElement('div');
    div_info.textContent = "";
    div_info.setAttribute('class', 'info info-append');
    var list = document.getElementsByClassName('d-content');
    list[0].after(div_info);

// tao image logo
    var img_logo = document.createElement('IMG');
    img_logo.src = "https://nguonhang24h.vn/images/logo.png";
    var list = document.getElementsByClassName('info-append');
    list[0].appendChild(img_logo,list[0]);

// tao box-info
    var box_info = document.createElement('div');
    box_info.textContent = "";
    box_info.setAttribute('class', 'box-info box-info-append');
    var list = document.getElementsByClassName('info-append');
    list[0].appendChild(box_info);

// tao ul
    var ul = document.createElement('ul');
    ul.textContent = "";
    ul.setAttribute('class', 'form-group ul-meta');
    var list = document.getElementsByClassName('box-info-append');
    list[0].appendChild(ul);

// tao li
// price_box[0].lastChild.previousSibling.innerText
    let price_cn = 0;
    var li_1 = document.createElement('LI');
    let price_box1 = document.getElementsByClassName('price-original-sku');
    if(price_box1[0] !== undefined) {
        price_cn = price_box1[0].lastChild.previousSibling.innerText;
        // li_1.textContent = "Gia ban " + price_cn + " te";
        // li_1.setAttribute('class', 'form-group');
        // var list = document.getElementsByClassName('ul-meta');
        // list[0].appendChild(li_1);
    } else {
        var span_price = document.getElementsByClassName('value price-length-6');
        price_cn = span_price[0].innerText;
    }

    var li_2 = document.createElement('LI');
    li_2.textContent = "Gia ban " + price_cn*3500 + " vnd";
    li_2.setAttribute('class', 'form-group');
    var list = document.getElementsByClassName('ul-meta');
    list[0].appendChild(li_2);

// tao li ma san pham
    var li_3 = document.createElement('LI');
    li_3.textContent = "";
    li_3.setAttribute('class', 'form-group li-ma-sp');
    var list = document.getElementsByClassName('ul-meta');
    list[0].appendChild(li_3);

    var label_masp = document.createElement('LABEL');
    label_masp.textContent = "Mã sản phẩm: ";
    var list = document.getElementsByClassName('li-ma-sp');
    list[0].appendChild(label_masp);

    var span_masp = document.createElement('SPAN');
    var list = document.getElementsByClassName('li-ma-sp');
    span_masp.setAttribute('class', 'span-masp');
    list[0].appendChild(span_masp);

    var b_masp = document.createElement('B');
    var masp = document.getElementById('offer_video_refKey');
    var masp_text = masp.value.split('-')[1];
    b_masp.textContent = masp_text;
    b_masp.setAttribute('class', 'color-blue');
    var list = document.getElementsByClassName('span-masp');
    list[0].appendChild(b_masp);
}