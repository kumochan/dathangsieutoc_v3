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
                    <div class="menu-don-hang">
                        <ul class="step-action" style="font-size: 14px">
                            @foreach($statusBar as $item)
                                @if(isset($item['active']))
                                    <li class="{{$item['active']}}">
                                @else
                                    <li>
                                @endif
                                        <a href="{{ action('Backend\OrderController@index', $item['currentUrl']) }}"
                                           style="margin: 0px 5px 2px 0px;">
                                            <span class="badge bg-aqua" style="margin: 0px 5px 2px 0px;">{{$item['total']}}</span>{{$item['name']}}
                                         </a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="toolbar">
                        <div class="form-inline" role="form">
                            @if(Auth::user()->can('edit-order'))
                            <div class="input-group">
                                <input type="text" name="user_name" placeholder="Tên khách hàng" class="form-control">
                            </div>
                            @endif
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Mã đơn hàng" class="form-control">
                            </div>
                           <!--  <input type="date" class="form-control date_picker" name="from_date" placeholder="Từ ngày"> -->
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control date_picker" name="from_date" placeholder="Từ ngày">
                                <div class="input-group-addon"></div>
                                <span class="input-group-text"><i class="md md-event-note"></i></span>
                            </div>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" class="form-control date_picker" name="to_date" placeholder="Đến ngày">
                                <div class="input-group-addon"></div>
                                <span class="input-group-text"><i class="md md-event-note"></i></span>
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
                        <th data-field="customer_id" data-sortable="false" data-formatter="getUserName">Tên khách hàng</th>
                        <th data-field="" data-sortable="false" data-formatter="getDetailPrice" class="text-center">Tiền hàng
                        </th>
                        <th data-field="" data-sortable="false" class="text-center" data-formatter="getTotalPrice">Tiền đơn
                        </th>
                        <th data-field="" data-sortable="false" class="text-center" data-formatter="getPrepayment">Đặt cọc
                        </th>
                        <th data-field="" data-sortable="false" class="text-center" data-formatter="getMissingPrice">Còn thiếu
                        </th>
                        <th data-field="number_order" data-sortable="false">SL</th>
                        <th data-field="warehouse" data-sortable="false">Kho đích</th>
                        <th data-field="status_name" data-sortable="false" data-formatter="getStatus">Trạng thái</th>
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
            $("#toolbar :input").each(function () {
                if(typeof $(this).attr('name') != 'undefined') {
                    params.data[$(this).attr('name')] = $(this).val();
                }
            });
            var url = "{{ action('Api\OrderController@grid', $currentUrl) }}";
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
            if(row.status_id == 1) {
                actions += '<a href="javascript:;" class="on-default remove-row text-danger grid-btn-delete" data-id="' + row.id + '" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i></a> ';
            }
            @if(Auth::user()->cant('edit-order'))
            actions += '<a href="{{ action("Backend\OrderDetailController@reportOrder", array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-warning red-warning"></i></a>';
            @endif
            return actions;
        }

        function getImage(value, row) {
            var actions = '';
            actions += '<img src="' + row.image + '" alt="user" style="max-width: 50px; max-height: 50px; vertical-align: unset;">'
            return actions;
        }

        function getLink(value, row) {
            var actions = '';
            actions += '<a href="{{ action("Backend\OrderDetailController@index" , "")}}/' + row.id + '" target="_blank" >ĐHST-' + row.customer_id + '-' +   row.id+ '</a> ';
            return actions;
        }

        function getDetailPrice(value, row) {
            var actions = '';
            actions += '<span class="float-right text-danger"><b class="money_type ">' + row.detail_total_price_vn + '</b><em>đ</em></span>';
            return actions;
        }

        function getTotalPrice(value, row) {
            var actions = '';
            actions += '<span class="text-danger"><b class="money_type">' + row.total_price_vn + '</b><em>đ</em></span>';
            return actions;
        }

        function getPrepayment(value, row) {
            var action = '';
            if (row.status_id <= 1) {
                action += 'Đặt cọc: 90% =  <b class="money_type">' + row.prepayment + '</b><em>đ</em> <br><span class="label label-table label-warning">Đặt cọc 90%</span>';
            } else {
                action += 'Đã cọc: 90% =  <b class="money_type">' + row.prepayment + '</b><em>đ</em> <br>(Chưa bao gồm phí phát sinh)';
            }
            return action;
        }

        function getStatus(value, row) {
            var action = '';
            if (row.status_id == 1) {
                action += '<span class="label label-warning">' + row.status_name + '</span>';
            } else if (row.status_id == 2) {
                action += '<span class="label label_wait">' + row.status_name + '</span>';
            } else if (row.status_id == 3) {
                action += '<span class="label label-pink">' + row.status_name + '</span>';
            } else if (row.status_id == 4) {
                action += '<span class="label label-success">' + row.status_name + '</span>';
            } else if (row.status_id == 5) {
                action += '<span class="label label-danger">' + row.status_name + '</span>';
            } else if (row.status_id == 6) {
                action += '<span class="label label-white">' + row.status_name + '</span>';
            } else if (row.status_id == 7) {
                action += '<span class="label label-info">' + row.status_name + '</span>';
            } else if (row.status_id == 8) {
                action += '<span class="label label-purple">' + row.status_name + '</span>';
            } else if (row.status_id == 9) {
                action += '<span class="label label label-default">' + row.status_name + '</span>';
            }
            return action;
        }

        function getMissingPrice(value, row) {
            var action = ''
            action += '<span class="text-danger float-right"><b class="money_type">' + row.arrears_fee + '</b><em>đ</em></span>';
            return action;
        }
        function getUserName(value, row) {
            var actions = '';
            actions += '<a href="{{ action("Backend\OrderController@userOrderIndex" , "")}}/' + row.customer_id + '" target="_blank" >' + row.customer_name +'</a> ';
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
        // $(document).ajaxStop(function() {
        //     $(".order_id").autocomplete({
        //           source: availableTags
        //     });
        //     $('#customer_id').autocomplete({
        //         source: userList
        //     });
        // });
    </script>
@endsection
