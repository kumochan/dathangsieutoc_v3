@extends('backend.layout')
@section('title', 'Danh sách Sản phẩm')
@section('css')
    <link href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("backend/plugins/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/history_transaction.css") }}"/>

    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card-box col-12">
                <div class="column-center">
                    <div class="row">
                        <div class="pd5 col-sm-4 col-md-3 bg-maroon disabled color-palette text-center">
                            <label>Tổng tiền nạp</label><br>
                            <b>+</b><b class="money_type" style="color: white">{{$wallet->deposit}}</b><em>đ</em>
                        </div>
                        <div class="pd5 col-sm-4 col-md-2 bg-gray color-palette text-center">
                            <label>Tổng tiền rút</label><br>
                            <b>-</b><b class="vnd-unit money_type">{{$wallet->withdraw}}</b><em>đ</em>
                        </div>
                        <div class="pd5 col-sm-4 col-md-2 bg-gray color-palette text-center">
                            <label>Tổng thanh toán</label><br>
                            <b>-</b><b class="vnd-unit money_type">{{$wallet->total_payment}}</b><em>đ</em>
                        </div>
                        <div class="pd5 col-sm-4 col-md-2 bg-gray color-palette text-center">
                            <label>Tổng tiền hoàn</label><br>
                            <b>+</b><b class="vnd-unit money_type">{{$wallet->refund}}</b><em>đ</em>
                        </div>
                        <div class="pd5 col-sm-4 col-md-3 bg-gray color-palette text-center">
                            <label>Số dư</label><br>
                            <b class="vnd-unit money_type">&nbsp;{{$wallet->balance}}</b><em>đ</em>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box mt-2 col-12">
                    <div class="row" id="toolbar">
                        <div class="input-group col-2">
                            <input type="text" class="form-control order_id" placeholder="Mã đơn hàng.."
                                   name="order_id">
                        </div>
                        <div class="input-group date col-2" data-provide="datepicker">
                            <input type="text" class="form-control date_picker" name="from_date" placeholder="Từ ngày">
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="md md-event-note"></i></span>
                            </div>
                        </div>
                        <div class="input-group date col-2" data-provide="datepicker">
                            <input type="text" class="form-control date_picker" name="to_date" placeholder="Đến ngày">
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="md md-event-note"></i></span>
                            </div>
                        </div>
                        <div class="input-group col-2">
                            <select class="select2 form-control transaction_status_id" data-placeholder="Trạng thái"
                                    name="transaction_status_id">
                                <option value="">Trạng thái</option>
                                <option value="1">Nạp tiền</option>
                                <option value="2">Rút tiền</option>
                                <option value="3">Thanh toán đơn hàng</option>
                                <option value="4">Đặt cọc đơn hàng</option>
                                <option value="5">Tất toán đơn hàng</option>
                                <option value="6">Hoàn lại tiền</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <button id="custom_search" type="submit" class="btn btn-primary float-right">Tìm kiếm
                            </button>
                        </div>
                    </div>
                <div class="column-center">
                    <table id="grid" class="table-bordered"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-search="false"
                           data-show-refresh="false"
                           data-show-toggle="false"
                           data-show-columns="false"
                           data-show-pagination-switch="false"
                           data-page-size="10"
                           data-page-list="[5, 10, 20, 30, 50]"
                           data-ajax="callAjaxRequest"
                           data-side-pagination="server"
                           data-pagination="true"
                           data-show-footer="false"
                           data-only-info-pagination="false"
                           data-locale="vi-VN"
                           data-pagination-pre-text="<< Trước"
                           data-pagination-next-text="Sau >>">
                        <thead>
                        <th data-field="" data-sortable="false" data-formatter="getTransactionCode">Mã GD</th>
                        <th data-field="transaction_status_name" data-sortable="false">Loại giao dịch</th>
                        <th data-field="" data-sortable="false" data-formatter="getTransactionPrice">Giá trị GD</th>
                        <th data-field="" data-sortable="false" data-formatter="getTransactionBalance">Số dư cuối</th>
                        <th data-field="" data-sortable="false" data-formatter="getTransactionNote">Nội dung</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var resizefunc = [];
    </script>
    <script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/detect.js") }}"></script>
    <script src="{{ asset("backend/assets/js/fastclick.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.slimscroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.blockUI.js") }}"></script>
    <script src="{{ asset("backend/assets/js/waves.js") }}"></script>
    <script src="{{ asset("backend/assets/js/wow.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.nicescroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.scrollTo.min.js") }}"></script>
    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>

    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js")}}"
            type="text/javascript"></script>
    <script src="{{ asset("backend/plugins/switchery/js/switchery.min.js")}}" type="text/javascript"></script>
    <script src="{{ asset("backend/plugins/multiselect/js/jquery.multi-select.js")}}" type="text/javascript"></script>
    <script src="{{ asset("backend/plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
    <script src="{{ asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js")}}"
            type="text/javascript"></script>
    @include('backend.shared.initjs')
    <script>
        var table = $('#grid');
        $(function () {
            $('#custom_search').click(function () {
                table.bootstrapTable('refresh');
            });
        });
        table.on('page-change.bs.table', function (e, number, size, search) {
            var offset = (number - 1) * size;
            table.bootstrapTable('refresh', {
                offset: offset,
                limit: size,
                search: search
            });
        });
        // $('.money_type2').each(function () {
        //     $(this).text(changeNumberType($(this).text()));
        // });
        table.on('load-success.bs.table', function (result) {
            $('.money_type2').each(function () {
                $(this).text(changeNumberType($(this).text()));
            });
        });

        function callAjaxRequest(params) {
            $("#toolbar :input").each(function () {
                if (typeof $(this).attr('name') != 'undefined') {
                    params.data[$(this).attr('name')] = $(this).val();
                }
            });
            params.data['transaction_status_id'] = $(".transaction_status_id").val();
            var url = "{{ action('Api\HistoryTransactionController@grid') }}";
            $.get(url + '?' + $.param(params.data)).then(function (result) { console.log(params.data);
                var obj = JSON.parse(result);
                params.success({
                    "total": obj.total,
                    "rows": obj.rows
                });
            });
        }
        function getTransactionCode(value, row) {
            var actions = '';
            actions += '<b>' +row.transaction_code + '</b> <br>' + row.transaction_created_at;
            return actions;
        }

        function getTransactionPrice(value, row) {
            var actions = '';
            actions += '<span class="float-right ">-<b class="money_type2 text-danger">' + row.transaction_price + '</b><em>đ</em></span>';
            return actions;
        }

        function getTransactionBalance(value, row) {
            var actions = '';
            actions += '<span class=" float-right"><b class="money_type2 text-danger">' + row.last_balance + '</b><em>đ</em></span>';
            return actions;
        }

        function getTransactionNote(value, row) {
            var actions = row.transaction_note;
            if(row.order_id != 0) {
                actions += '<br><a href="{{ action("Backend\OrderDetailController@index" , "")}}/' + row.order_id + '" target="_blank" style="color: #0b0b0b; text-decoration:underline">ĐHST-' +   row.order_id+ '</a> ';
            }
            return actions;
        }

        function changeNumberType(number) {
            const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'VND',
            });
            new_number = formatter.format(number);
            return new_number.substring(1);
        }
    </script>
@endsection
