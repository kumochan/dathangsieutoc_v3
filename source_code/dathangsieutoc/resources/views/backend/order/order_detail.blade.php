@extends('backend.layout')
@section('title', 'Chi Tiết Đơn Hàng')
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
    <input type="hidden" value="{{$orders[0]->status_id}}" class="status_id">
    <input type="hidden" value="{{$orders[0]->status_name}}" class="status_name">
    <div class="container-fluid">
        <div class="box-step-order">
            <div class="stepwizard">
                <div class="stepwizard-row">
                    @foreach($status_bar as $item)
                        @if(!empty($item['currentUrl']))
                            <div class="stepwizard-step">
                                @if(isset($item['active']))
                                    <span class="badge bg-aqua bg-blue-active ">{{$item['currentUrl']}}</span>
                                @else
                                    <span class="badge bg-aqua">{{$item['currentUrl']}}</span>
                                @endif
                                <p>{{$item['name']}}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-box col-8 col-md-7 custom_card_box">
                <div class="mb-1">
                    <i class="fa fa-eye">Thông tin đơn hàng</i>
                </div>
                <table class="table table-bordered table-summary table-hover" id="table-order">
                    <tbody>
                    <tr>
                        <td style="border-bottom:2px solid #dddddd">
                            <div class="border_bottom">
                                <span class="pull_left">Mã đơn hàng:</span>
                                <b class="pull_right">ĐHST-{{$orders[0]->id}}</b>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">Tên khách hàng:</span>
                                <b class="pull_right">{{$orders[0]->customer_name}} ({{$orders[0]->username}})</b>
                            </div>
                            <div class="border_bottom last">
                                <span class="pull_left">Nhân viên quản lý:</span>
                                <div class="pull_right" style="font-size: 14px">
                                    @if (!empty($array_user))
                                        @foreach($array_user as $user)
                                            <label class="label label-success">{{$user->name}}</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="border-bottom:2px solid #dddddd">
                            <div class="border_bottom">
                                <span class="pull_left exchange_rate">Tỷ giá áp dụng:</span>
                                <span class="pull_right"><b>{{$exchange_rate}}<em>đ</em></b></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">Số lượng sản phẩm:</span>
                                <span class="pull_right"><b class="number_counted">{{$orders[0]->number_counted}}</b>/<b
                                            class="number_order">{{$orders[0]->number_order}}</b></span>
                            </div>
                            <div class="border_bottom last">
                                <span class="pull_left">Cân nặng:</span>
                                <span class="pull_right"><b>{{$orders[0]->weight}}</b>/<b
                                            class="money_type">{{$orders[0]->weight_fee}}</b></span>
                            </div>
                        </td>
                    </tr>
                    <tr style="background: #f5f5f5">
                        <td width="50%">
                            <div class="text-center">TẤT TOÁN ĐƠN HÀNG</div>
                            <div class="border_bottom">
                                <span class="pull_left">(1) Tiền hàng: {{$orders[0]->price_cn}} ¥</span>
                                <span class="pull_right"><b
                                            class="money_type">{{$orders[0]->price_vn}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">(2) Phí ship nội địa TQ: {{$orders[0]->ship_cn}} ¥</span>
                                <span class="pull_right"><b
                                            class="money_type">{{$orders[0]->ship_cn}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">(3) Phí mua hàng (3%) :</span>
                                <span class="pull_right"><b
                                            class="money_type">{{$orders[0]->purchase_fee}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">(4) Phí phát sinh:</span>
                                <span class="pull_right"><b
                                            class="money_type">{{$orders[0]->additional_fee}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">(5) Tổng tiền cân nặng:</span>
                                <span class="pull_right"><b class="money_type">{{$orders[0]->weight_fee}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">(6) Kiểm đếm:</span>
                                <span class="pull_right"><b
                                            class="money_type">{{$orders[0]->counting_fee}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">(7) Đóng gỗ:</span>
                                <span class="pull_right"><b class="money_type">{{$orders[0]->packing_fee}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom last">
                                <span class="pull_left">(8) Phí ship VN:</span>
                                <span class="pull_right"><b
                                            class="money_type">{{$orders[0]->ship_vn}}</b><em>đ</em></span>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">TIỀN HÀNG
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">Tổng phí:</span>
                                <span class="pull_right"><b class="money_type total_price_vn">{{$orders[0]->total_price_vn}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">Đã thanh toán:</span>
                                <span class="pull_right"><b class="money_type">{{$orders[0]->prepayment}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">Còn thiếu:</span>
                                <span class="pull_right"><b class="money_type">{{$orders[0]->arrears_fee}}</b><em>đ</em></span>
                            </div>
                            <div class="border_bottom">
                                <span class="pull_left">Ghi chú:</span>
                                <span class="pull_right">{{$orders[0]->note}}</span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4 col-md-5">
                <div class="card-box">
                    <div class="mb-1">
                        <i class="fa fa-shopping-cart"></i> Danh sách mã vận đơn
                    </div>
                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th class="text-center">Mã vận đơn</th>
                            <th class="text-center">Cân tính tiền</th>
                            <th class="text-center">Trạng thái</th>
                        </tr>
                        @if($orders[0]->status_id > 4)
                            <tr>
                                <td class="text-center">{{$orders[0]->shipping_code}}</td>
                                <td class="text-center">{{$orders[0]->weight}}</td>
                                <td class="text-center status_span"></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-box col-8 col-md-7">
                <div class="page-title">
                    <span>
                        Shop: {{$orders[0]->shop_name}} ({{$orders[0]->number_order}})
                    </span>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <thead>
                                <tr class="border-none">
                                    <th data-priority="1" class="text-center">Sản phẩm</th>
                                    <th data-priority="3" class="text-center">Số lượng</th>
                                    <th data-priority="1" class="text-center">Giá (¥)</th>
                                    <th data-priority="3" class="text-center">Thành tiền (¥)</th>
                                    <th data-priority="3" class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key => $item)
                                    <!--table-->
                                    <tr class="custom_height">
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><img
                                                            src="{{ asset($item->image_link)}}"
                                                            alt="user" class=""
                                                            style="max-width: 80px; max-height: 80px; vertical-align: unset;">
                                                </li>
                                                <li class="list-inline-item"
                                                    style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">
                                                    <p data-toggle="tooltip" data-placement="right"
                                                       title="{{$item->name}}">{{$item->name}}</p>
                                                    <p>Kích thước : {{$item->size}}</p>
                                                    <p>Màu sắc : {{$item->color}}</p>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            <span> {{$item->number}} </span>
                                        </td>
                                        <td>
                                            <p class="font-weight-bold money_type current_price_vn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_price_vn}}</p>
                                            <p class="current_price_cn_{{$item->id}}_{{$item->order_id}} font-weight-bold">{{$item->detail_price_cn}} (¥)</p>
                                            <p>X1</p>
                                        </td>
                                        <td>
                                            <p class="font-weight-bold money_type current_total_price_vn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_total_price_vn}}</p>
                                            <p class="font-weight-bold current_total_price_cn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_total_price_cn}} (¥)</p>
                                        </td>
                                        <td class="actions">
                                            <a href="#" class="on-default remove-row" data-toggle="tooltip"
                                               data-placement="top" title="" data-original-title="Delete"><i
                                                        class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <!-- end table -->
                                @endforeach
                                </tbody>
                            </div>
                        </div>
                    </table>
                </div>
                <!--end item-->
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
