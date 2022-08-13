@extends('backend.layout')
@section('title', 'Danh sách Sản phẩm')
@section('css')


    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    {{--<link href="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>



@endsection

@section('content')

    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">

                <div class="btn-group pull-right m-t-15">
                    <label for=""></label>
                </div>
                <div class="btn-group pull-right m-t-15">
                    <a href="{{ action('Backend\ProductController@showAddForm') }}" class="btn btn-default">
                        <i class="fa fa-plus"></i></a>
                </div>
                <h4 class="page-title">Danh sách Sản Phẩm</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\ProductController@index') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>

            </div>
        </div>

        <!--Custom Toolbar-->
        <!--===================================================-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">

                    @if(Auth::user()->can('delete-product'))
                        <button id="grid-btn-delete-multi" class="btn btn-danger"
                                data-toggle="modal" data-target=".modal-delete" disabled>
                            <i class="fa fa-times m-r-5"></i>Xóa
                        </button>
                    @endif
                    @if(Auth::user()->can('add-product'))
                            Tỉ giá : {{$tigia}}
                    @endif
                        {{--<div id="toolbar">--}}
                            {{--<button id="button" class="btn btn-secondary">filterBy</button>--}}
                        {{--</div>--}}
                    {{--<div id="key_filter">--}}
                        {{--<div class="dropdown">--}}
                            {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"--}}
                                    {{--data-toggle="dropdown"--}}
                                    {{--aria-haspopup="true" aria-expanded="true">Tìm kiếm<span--}}
                                    {{--class="caret"></span>--}}
                            {{--</button>--}}
                            {{--<ul class="dropdown-menu alertFilter" aria-labelledby="dropdownMenu1">--}}
                                {{--<li id="status1"><a href="#">status1</a></li>--}}
                                {{--<li id="status2"><a href="#">status2</a></li>--}}
                                {{--<li id="status3"><a href="#">status3</a></li>--}}
                                {{--<li id="status4"><a href="#">Kho TQ đã kí nhận</a></li>--}}
                                {{--<li id="status5"><a href="#">Đang chuyển HN</a></li>--}}
                                {{--<li id="status6"><a href="#">Hà nội đã nhận</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <table id="grid" class="table-bordered"
                           data-toggle="table"
                           data-toolbar="#grid-btn-delete-multi"
                           data-search="true"
                           data-show-refresh="false"
                           data-show-toggle="false"
                           data-show-columns="false"
                           data-show-pagination-switch="true"
                           data-page-size="10"
                           data-page-list="[5, 10, 20, 30, 50]"
                           data-url="{{ action('Api\ProductController@grid') }}"
                           data-side-pagination="server"
                           data-pagination="true"
                           data-show-footer="false"
                           data-only-info-pagination="false"
                           data-locale="vi-VN"
                           data-pagination-pre-text="<< Trước"
                           data-pagination-next-text="Sau >>">
                        <thead>
                        <tr class="">
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="name" data-sortable="false" data-formatter="link" >Tên
                            </th>
                            <th data-field="price" data-sortable="false" class="text-right">Giá</th>
                            <th data-field="number" data-sortable="false">Số lượng</th>
                            <th data-field="discount" data-sortable="false" class="text-right">Chiết khấu</th>
                            <th data-field="shipCN" data-sortable="false" class="text-right">Phí ship TQ</th>
                            <th data-field="rate" data-sortable="false">Tỉ giá</th>
                            <th data-field="sum" data-sortable="false" class="text-right">Tổng tệ</th>

                            <th data-field="created_at" data-sortable="false">Ngày tạo
                            </th>
                            <th data-field="updated_at" data-sortable="false">Ngày
                                cập nhật
                            </th>
                            <th data-field="id" data-formatter="gridAction">Hành động</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Xóa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    Bạn đồng ý xóa?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    <form method="POST" class="form-delete">
                        {{ csrf_field() }}
                        <input type="hidden" id="ids" name="ids" value="">
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Xóa</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('javascript')
    <script>
        var resizefunc = [];
    </script>

    <script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>
    {{--<script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>--}}
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
    @include('backend.shared.initjs')
    <script>
        $(document).ready(function () {
            var $table = $('#grid');
            $remove = $('#grid-btn-delete-multi');

            $table.on('load-success.bs.table', function () {
                $remove.prop('disabled', true);
                $('.modal-delete').modal('hide');
                $('.grid-btn-delete').on('click', function () {
                    $('.form-delete #ids').val($(this).attr('data-id'));
                });
            });

            $table.on('page-change.bs.table', function (e, number, size, search) {
                var offset = (number - 1) * size;
                $table.bootstrapTable('refresh', {
                    offset: offset,
                    limit: size,
                    search: search
                });
            });

            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
            });

            $remove.on('click', function () {
                var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                    return row.id
                });
                $('.form-delete #ids').val(ids);
            });

            $('.form-delete').on('submit', function () {
                event.preventDefault();
                $.ajax({
                    url: '{{ action('Backend\ProductController@delete') }}', type: 'POST', dataType: 'JSON',
                    data: $(this).serialize(),
                    success: function (response) {
                        $table.bootstrapTable('refresh', {silent: true});
                    }
                });
            });
        });

        function gridAction(value, row) {
            var actions = '';
            // console.log(array('id'));
            @if(Auth::user()->can('edit-product'))
                actions += '<a href="{{ action('Backend\ProductController@showEditForm', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a> ';
            @endif
            @if(Auth::user()->can('delete-product'))
                actions += '<a href="javascript:;" class="on-default remove-row text-danger grid-btn-delete" data-id="' + row.id + '" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i></a> ';
            @endif

                return actions;
        }
        function link(value, row) {
            var actions = '';
            actions += '<a target="_blank" href="'+row.link+'" class="on-default remove-row text-danger " data-id="' + row.id + '"  ><div class="tooltipun">'+row.name+'<span class="tooltiptext"> '+row.content+'</span></div> </a> ';
            return actions;
        }

    </script>


@endsection
