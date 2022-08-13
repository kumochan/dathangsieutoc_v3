@extends('backend.layout')
@section('title', 'Danh sách sản phẩm')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/dialog.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
        </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div id="toolbar">
                        <div class="form-inline" role="form">
                            <div class="input-group">
                                <input type="text" name="user_name" placeholder="Tên khách hàng" class="form-control">
                            </div>
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Mã đơn hàng" class="form-control">
                            </div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control date_picker" name="from_date" placeholder="Từ ngày">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="md md-event-note"></i></span>
                                </div>
                            </div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control date_picker" name="to_date" placeholder="Đến ngày">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="md md-event-note"></i></span>
                                </div>
                            </div>
                            <button id="search_by_date" type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
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
                        <th data-field="numerical_order" data-sortable="false">STT</th>
                        <th data-field="image_link" data-sortable="false" data-formatter="getImage">Ảnh</th>
                        <th data-field="order_id" data-sortable="false" data-formatter="getLink">Mã ĐH</th>
                        <th data-field="note" data-sortable="false">Nội dung khiếu nại
                        </th>
                        <th data-field="order_id" data-formatter="gridAction">Thao tác</th>
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
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>
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
    <script src="{{ asset("backend/assets/js/dialog.js")}}"></script>
    @include('backend.shared.initjs')
    <script>
        var table = $('#grid');
        var search_by_date = $('#search_by_date');

        $(function() {
            search_by_date.click(function () {
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

        table.on('load-success.bs.table', function (result) {
            $('.money_type').not('#sidebar-menu .money_type').each(function () {
                $(this).text(changeNumberType($(this).text()));
            });
        });
        function callAjaxRequest(params) {
            params.data['complain'] = true;
            $("#toolbar :input").each(function () {
                if(typeof $(this).attr('name') != 'undefined') {
                    params.data[$(this).attr('name')] = $(this).val();
                }
            });
            var url = "{{ action('Api\OrderController@grid', 11) }}";
            $.get(url + '?' + $.param(params.data)).then(function (result) {
                params.success({
                    "total": result.total,
                    "rows": result.rows
                });

            });
        }

        function gridAction(value, row) {
            var actions = '';
            let user_id = row.id;
            actions += '<a href="{{ action("Backend\OrderDetailController@index" , array('id'=>'')) }}/' + row.id + '" target="_blank" ><i class="fa fa-th-list"></i></a> ';
            @if(Auth::user()->can('edit-order'))
            actions += '<a href="{{ action("Backend\OrderDetailController@showEditForm", array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a> ';
            @endif
                actions += '<a href="{{ action("Backend\OrderController@softDelete", array('id'=>'')) }}/' + row.id + '" class="on-default remove-row text-danger" data-id="' + row.id + '" ><i class="fa fa-trash-o"></i></a> ';
            return actions;
        }

        function getImage(value, row) {
            var actions = '';
            actions += '<img src="' + row.image + '" alt="user" style="max-width: 50px; max-height: 50px; vertical-align: unset;">'
            return actions;
        }

        function getLink(value, row) {
            var actions = '';
            actions += '<a href="{{ action("Backend\OrderDetailController@index" , "")}}/' + row.id + '" target="_blank" >ĐHST-'+ row.customer_id + '-' + row.id+ '</a> ';
            return actions;
        }
    </script>
@endsection
