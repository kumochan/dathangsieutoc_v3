$(document).ready(function () {
    var status_id = $('.status_id').val();
    var status_name = $('.status_name').val();
    var apend_span = getStatus(status_id, status_name);
    $('.status_span').append(apend_span);

});

function getStatus(status_id, status_name) {
    var action = '';
    if (status_id == 1) {
        action += '<span class="label label-warning">' + status_name + '</span>';
    } else if (status_id == 2) {
        action += '<span class="label label_wait">' + status_name + '</span>';
    } else if (status_id == 3) {
        action += '<span class="label label-pink">' + status_name + '</span>';
    } else if (status_id == 4) {
        action += '<span class="label label-success">' + status_name + '</span>';
    } else if (status_id == 5) {
        action += '<span class="label label-danger">' + status_name + '</span>';
    } else if (status_id == 6) {
        action += '<span class="label label-white">' + status_name + '</span>';
    } else if (status_id == 7) {
        action += '<span class="label label-info">' + status_name + '</span>';
    } else if (status_id == 8) {
        action += '<span class="label label-purple">' + status_name + '</span>';
    } else if (status_id == 9) {
        action += '<span class="label label label-default">' + status_name + '</span>';
    }
    return action;
}