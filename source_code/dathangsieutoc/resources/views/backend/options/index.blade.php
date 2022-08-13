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
                        <a href="#service_fee" data-toggle="tab" aria-expanded="false" class="nav-link active show">Phí
                            dịch vụ</a>
                    </li>
                    <li class="nav-item tab">
                        <a href="#transport_fee" data-toggle="tab" aria-expanded="false" class="nav-link">Phí vận
                            chuyển</a>
                    </li>
                    <li class="nav-item tab">
                        <a href="#deposit_fee" data-toggle="tab" aria-expanded="false" class="nav-link">Phí kí gửi</a>
                    </li>
                    <li class="nav-item tab">
                        <a href="#exchange_rate" data-toggle="tab" aria-expanded="false" class="nav-link">Tỉ giá</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="service_fee">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form-horizontal row" role="form" action="{{ action('Backend\OptionsController@update', 'service_fee') }}" method = "POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tiêu đề</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control"
                                                           value="{{$option->service_fee->title}}" name="title">
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tiêu đề phụ</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control"
                                                           value="{{$option->service_fee->header}}" name="header">
                                                </div>
                                            </div>
                                            @foreach($option->service_fee->content as $key => $item)
                                                <div class="form-group row col-md-6">
                                                    <label class="col-3 col-form-label">Nội dung số {{$key + 1}}</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control"
                                                               value="{{$item}}" name="service_fee_content[]">
                                                    </div>
                                                </div>
                                            @endforeach
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
                    <div class="tab-pane" id="transport_fee">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form-horizontal row" role="form" action="{{ action('Backend\OptionsController@update', 'transport_fee') }}" method = "POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tiêu đề</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control"
                                                           value="{{$option->transport_fee->title}}" name="title">
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tiêu đề phụ</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control"
                                                           value="{{$option->transport_fee->header}}" name="header">
                                                </div>
                                            </div>
                                            @foreach($option->transport_fee->content as $key => $item)
                                                <div class="form-group row col-md-6">
                                                    <label class="col-3 col-form-label">Nội dung số {{$key + 1}}</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control"
                                                               value="{{$item}}" name="transport_fee_content[]">
                                                    </div>
                                                </div>
                                            @endforeach
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
                    <div class="tab-pane" id="deposit_fee">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form-horizontal row" role="form" action="{{ action('Backend\OptionsController@update', 'deposit_fee') }}" method = "POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tiêu đề</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control"
                                                           value="{{$option->deposit_fee->title}}" name="title">
                                                </div>
                                            </div>
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tiêu đề phụ</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control"
                                                           value="{{$option->deposit_fee->header}}" name="header">
                                                </div>
                                            </div>
                                            @foreach($option->deposit_fee->content as $key => $item)
                                                <div class="form-group row col-md-6">
                                                    <label class="col-3 col-form-label">Nội dung số {{$key + 1}}</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control"
                                                               value="{{$item}}" name="deposit_fee_content[]">
                                                    </div>
                                                </div>
                                            @endforeach
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
                    <div class="tab-pane" id="exchange_rate">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form-horizontal row" role="form" action="{{ action('Backend\OptionsController@update', 'exchange_rate') }}" method = "POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row col-md-6">
                                                <label class="col-3 col-form-label">Tỉ giá</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" value="{{$option->exchange_rate}}" name="exchange_rate">
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
    <script src="{{asset('backend/assets/js/jquery.min.js') }}"></script>
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
        $(document).ready(function () {
            $.ajax({
                url: '{{ action('Api\NewsController@treeCategory') }}', type: 'GET', dataType: 'JSON',
                data: {},
                success: function (data) {
                    $('#checkTree').zenTree({
                        data: data,
                        target: '#categories'
                    });
                }
            });
        });
    </script>
    @include('backend.shared.initjs')
@endsection