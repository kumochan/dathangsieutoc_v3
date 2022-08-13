var images = document.getElementsByTagName('img');
for (var i = 0, l = images.length; i < l; i++) {
  images[i].src = 'http://placekitten.com/' + images[i].width + '/' + images[i].height;
}

/*
var div = document.createElement('div');
div.textContent = "Sup, y'all?";
div.setAttribute('class', 'small-box bg-green');
var list = document.getElementsByClassName('small-box bg-green');
list[0].parentNode.insertBefore(div, list[0]);
*/

var div_bg_green = document.createElement('div');
div_bg_green.textContent = "Sup, y'all?";
div_bg_green.setAttribute('class', 'small-box bg-green bg-green-append');
var list = document.getElementsByClassName('small-box bg-green');
list[0].parentNode.insertBefore(div_bg_green, list[0]);

var inner = document.createElement('div');
inner.textContent = "";
inner.setAttribute('class', 'inner inner-append');
var list = document.getElementsByClassName('bg-green-append');
list[0].appendChild(inner);

var form_group_1 = document.createElement('div');
form_group_1.textContent = "form-group";
form_group_1.setAttribute('class', 'form-group');
var list = document.getElementsByClassName('inner-append');
list[0].appendChild(form_group_1);


var icon = document.createElement('div');
icon.textContent = "";
icon.setAttribute('class', 'icon icon-append');
var list = document.getElementsByClassName('bg-green-append');
list[0].appendChild(icon);

var i_icon = document.createElement('i');
i_icon.textContent = "";
i_icon.setAttribute('class', 'fa fa-usd');
var list = document.getElementsByClassName('icon-append');
list[0].appendChild(i_icon);
