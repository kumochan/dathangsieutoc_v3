document.addEventListener('DOMContentLoaded', function() {
  var checkPageButton = 
  //document.getElementById('checkPage');
  document.getElementsByClassName("info-box-number text-red");
  
  checkPageButton.addEventListener('click', function() {

    chrome.tabs.getSelected(null, function(tab) {
      var node = document.createElement("LI");                 // Create a <li> node
      var textnode = document.createTextNode("Water");         // Create a text node
      node.appendChild(textnode);                     
      //document.getElementsByName("greenbox").appendChild(node);
      //
      document.querySelector(".tm-fcs-panel").before(node);

      //detail.1688
      //document.querySelector(".tb-subtitle").appendChild(node);
      //document.getElementById('#J_TEditItem').appendChild(node);
      
      //d = document;
      // var f = d.createElement('form');
      // f.action = 'http://gtmetrix.com/analyze.html?bm';
      // f.method = 'post';
      // var i = d.createElement('input');
      // i.type = 'hidden';
      // i.name = 'url';
      // i.value = tab.url;
      // f.appendChild(i);
      // d.body.appendChild(f);
      // f.submit();
    });
  }, false);
}, false);