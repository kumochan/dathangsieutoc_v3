@extends('backend.layout')
@section('title', 'Khiếu nại đơn hàng')
@section('css')
<link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/plugins/select2/css/select2.min.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}"/>
<link rel="stylesheet"
href="{{ asset('backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}"/>
<link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/custom.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/order_detail.css") }}">
<script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="col-sm-12" style="padding-bottom: 10px">
            <h4 class="page-title">Thông tin đơn hàng khiếu nại</h4>
            </div>
        </div>
        <div class="card-box col-12 custom_card_box">
            @include('backend.shared.flash-message')
            <form action="{{ action("Backend\OrderDetailController@setReportOrder")}}" method = "POST" class="row">
                 {{ csrf_field() }}
                <input type="hidden" value="{{$orders[0]->order_id}}" name="order_id">
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">Mã đơn hàng:</label>
                    <div class="col-10">
                        <span>ĐHST-{{$orders[0]->id}}</span>
                    </div>
                </div>
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">Tên khách hàng:</label>
                    <div class="col-10">
                        <span>{{$orders[0]->customer_name}} ({{$orders[0]->username}})</span>
                    </div>
                </div>
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">Nhân viên quản lý:</label>
                    <div style="font-size: 14px">
                        @if (!empty($array_user))
                        @foreach($array_user as $user)
                        <label class="label label-success">{{$user->name}}</label>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">Tỷ giá áp dụng:</label>
                    <div class="col-10">
                        <b>{{$exchange_rate}}<em>đ</em></b>
                    </div>
                </div>                
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">Số lượng sản phẩm:</label>
                    <div class="col-10">
                     <span><b class="number_counted">{{$orders[0]->number_counted}}</b>/<b
                        class="number_order">{{$orders[0]->number_order}}</b></span>
                    </div>
                </div>                
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">Cân nặng:</label>
                    <div class="col-10">
                        <span><b>{{$orders[0]->weight}}</b>/<b
                            class="money_type">{{$orders[0]->weight_fee}}</b></span>
                    </div>
                </div>                
                <div class="form-group row col-6 col-sm-12">
                    <label class="col-2 col-form-label">nội dung khiếu nại</label>
                    <div class="col-10">
                        <textarea name="" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="form-group row col-6 col-sm-12">
                    <input type="submit" class="btn btn-primary" style="margin-left: 10px;margin-right: 10px;">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
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

<script src="{{ asset("backend/plugins/jstree/jstree.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js") }}"></script>
<script src="{{ asset("backend/plugins/switchery/js/switchery.min.js") }}"></script>
<script src="{{ asset("backend/plugins/multiselect/js/jquery.multi-select.js") }}"></script>
<script src="{{ asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js") }}"></script>
<script src="{{ asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js") }}"></script>
<script src="{{ asset("backend/plugins/select2/js/select2.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js") }}"></script>
<script src="{{ asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") }}"></script>
<script src="{{ asset("backend/plugins/tinymce/tinymce.min.js") }}"></script>

<script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>
<script src="{{ asset("backend/assets/js/order_detail.js") }}"></script>

@include('backend.shared.initjs')
<script>

</script>
@endsection
