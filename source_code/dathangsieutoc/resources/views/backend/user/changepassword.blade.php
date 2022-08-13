@extends('backend.layout')
@section('title', ' Đổi mật khẩu ')
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
                    <i class="fa fa-plus"></i></a>
                </div>

                <h4 class="page-title">Đổi mật khẩu</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\UserController@index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu user</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add"
              action="{{ action('Backend\UserController@changePassword') }}">
            @csrf
            <div class="row">
                <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                <div class="col-lg-4 col-form">
                    <div class="card-box">
                        <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            @include('backend.shared.flash-message')
                        </div>

                        <div class="form-group">
                            <label for="name">Username<span class="text-danger">*</span></label>
                            <input type="text" id="username" name="username" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ $user->username }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Nhập mậu khẩu cũ<span class="text-danger">*</span></label>
                            <input type="password" id="now_password" name="now_password" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="slug">Mật khẩu mới <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('password') }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Xác nhận mật khẩu mới<span class="text-danger">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('password_confirmation') }}">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Cập nhật</button>
                        </div>
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->

                {{--<div class="col-lg-8 col-grid">--}}
                    {{--<div class="card-box">--}}
                        {{--role-list--}}
                        {{--<h4 class="m-t-0 header-title">Danh sách roles</h4>--}}
                        {{--<hr>--}}

                    {{--</div>--}}
                {{--</div>--}}

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
        });
    </script>
@endsection
