@extends('backend.layout')
@section('title', 'Danh sách tùy chỉnh')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/custom.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Danh sách tùy chỉnh</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\OptionsController@index') }}">Tùy chỉnh</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div>
        </div>
{{--        @include('backend.shared.flash-message')--}}
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs tabs">
                    <li class="nav-item tab">
                        <a href="#service_fee" data-toggle="tab" aria-expanded="false" class="nav-link active show">Thêm mới giao dịch</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="service_fee">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        @include('backend.shared.flash-message')
                                        <form class="form-horizontal row" role="form" action="{{ action('Backend\HistoryTransactionController@store') }}" method = "POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Người dùng (*)</label>
                                                <div class="col-9">
                                                    <input type="text" name='customer_id' class="customer_id form-control" id="customer_id" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Loại giao dịch  (*)</label>
                                                <div class="col-9">
                                                    <select class="select2 form-control transaction_status_id" data-placeholder="Trạng thái"
                                                            name="transaction_status_id" required="">
                                                        <option value="">---- Trạng thái ----</option>
                                                        <option value="1">Nạp tiền</option>
                                                        <option value="2">Rút tiền</option>
                                                        <option value="3">Thanh toán đơn hàng</option>
                                                        <option value="4">Đặt cọc đơn hàng</option>
                                                        <option value="5">Tất toán đơn hàng</option>
                                                        <option value="6">Hoàn lại tiền</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Số tiền (*)</label>
                                                <div class="col-9">
                                                    <input type="number" class="form-control transaction_price"
                                                           value="0" name="transaction_price" min="0" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Số dư</label>
                                                <div class="col-9">
                                                    <input type="number" class="form-control last_balance"
                                                           value="0" name="last_balance" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Ghi chú</label>
                                                <div class="col-9">
                                                    <textarea class="form-control" name="note"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Giao dịch số (*)</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control order_id"
                                                           value="" name="order_id">
                                                </div>
                                            </div>
                                            <div class="form-group row col-12">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Cập nhật
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="{{asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{asset('backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('backend/assets/js/detect.js') }}"></script>
    <script src="{{asset('backend/assets/js/fastclick.js') }}"></script>
    <script src="{{asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{asset('backend/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{asset('backend/assets/js/wow.min.js') }}"></script>
    <script src="{{asset('backend/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{asset('backend/assets/js/jquery.scrollTo.min.js') }}"></script>

    <script src="{{asset('backend/assets/js/jquery.core.js') }}"></script>
    <script src="{{asset('backend/assets/js/jquery.app.js') }}"></script>
    <script>
        let userList = [];
        let availableTags = [];
        let transaction_price = 0;
        $.ajax({
            method: 'GET',
            url: "{{action('Backend\UserController@getUserList')}}",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            },
            success: function(data) {
             userList = data;
         }
        });
        var plus = [0, 1, 6];

        $(document).ready(function () {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
                }
              });
            $('#customer_id').change(function() {
                var user_name = $(this).val();
                if(user_name != '') {
                    $.ajax({
                        method: 'POST',
                        url: "{{ action('Backend\HistoryTransactionController@getWalletByUserId')}}",
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                        },
                        data: {user_name: user_name},
                        success: function(result) {
                            var new_balance = parseFloat($('.transaction_price').val()) + parseFloat(result);
                            $('.last_balance').val(new_balance);
                        }
                    });
                    $.ajax({
                        method: 'POST',
                        url: "{{ action('Backend\OrderController@getListOrderByUserId')}}",
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                        },
                        data: {user_name: user_name},
                        success: function(result) {
                            availableTags = result;
                        }
                    });
                }
            });
            $('form').submit(function(e) {
                $(':disabled').each(function(e) {
                    $(this).removeAttr('disabled');
                });
            });
        });
        $(document).ajaxStop(function() {
            $(".order_id").autocomplete({
                  source: availableTags
            });
            $('#customer_id').autocomplete({
                source: userList
            });
        });
    </script>
    @include('backend.shared.initjs')
@endsection