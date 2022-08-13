@extends('backend.layout')
@section('title', 'Thêm user')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>

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
                    {{--<a href="{{ action('Backend\NewsController@category') }}" class="btn btn-default">--}}
                    <i class="fa fa-plus"></i></a>
                </div>

                <h4 class="page-title">Thêm Khách Hàng</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\CustomerController@index') }}">Khách Hàng</a></li>
                    <li class="breadcrumb-item active">Thêm khách Hàng</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add" action="{{ action('Backend\CustomerController@add') }}">
            {{csrf_field()}}
            <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">
                        {{--<input type="hidden" id="id" name="id" value="{{ $term->id }}">--}}
                        <div class="form-group">
                            @include('backend.shared.flash-message')
                        </div>

                        <div class="form-group">
                            <label for="name">Tên<span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="text" id="email" name="email" parsley-trigger="change"
                                   placeholder="" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại<span class="text-danger">*</span></label>
                            <input type="text" id="phone" name="phone" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Địa chỉ<span class="text-danger">*</span></label>
                            <input type="text" id="address" name="address" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('address') }}">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Thêm</button>
                        </div>

                        <input type="hidden" value="" name="list-roles" class="js-list-permission"/>

                    </div> <!-- end card-box -->


                </div>
                <!-- end col -->


            </div>
        </form>
        <!-- end row -->

    </div> <!-- container -->

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

    <script src="{{ asset("backend/plugins/jstree/jstree.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>

    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>
    <script src="{{ asset("backend/assets/pages/jquery.tree.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>

    @include('backend.shared.initjs')

    <script type="text/javascript">
        $(document).ready(function () {


        function gridAction(value, row) {
            var actions = '';
            @if(Auth::user()->can('edit-role'))
                actions += '<a href="{{ action('Backend\RoleController@showEditForm', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a> ';
            @endif
                    @if(Auth::user()->can('delete-role'))
                actions += '<a href="javascript:;" class="on-default remove-row text-danger grid-btn-delete" data-id="' + row.id + '" data-toggle="modal" data-target=".modal-delete"><i data-id="' + row.id + '" class="fa fa-trash-o grid-btn-delete"></i></a> ';
            @endif
                return actions;
        }
    </script>
@endsection
