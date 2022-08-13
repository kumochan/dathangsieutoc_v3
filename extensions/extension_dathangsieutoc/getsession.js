if(window.location.href == 'http://127.0.0.1:8000/backyard') {
    var sessionData = document.getElementById('sessionData').value;
    var user_id = document.getElementById('user_id').value;
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    chrome.storage.sync.set({'token': sessionData, 'user_id': user_id, 'csrf_token': csrf_token}, function() {
        console.log('Settings saved');
    });
}
