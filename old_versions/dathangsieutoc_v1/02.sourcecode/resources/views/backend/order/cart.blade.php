@extends('backend.layout')
@section('title', 'Thêm sản phẩm')
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
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box card-box-header">
                    <div class="page-header-2">
                        <ol class="pull-right mb-0 list-inline">
                            <li class="list-inline-item">Tổng số shop: <span
                                        class="number-pr text-bold total_shop"></span></li>
                            <li class="list-inline-item">Tổng số sản phẩm: <span
                                        class="number-pr text-bold total_product"></span>
                            </li>
                            <li class="list-inline-item">Tổng tiền tệ: <span
                                        class="number-pr text-bold all_price_cn"></span> ¥
                            </li>
                            <li class="list-inline-item">Tổng tiền: <span
                                        class="number-pr text-bold all_price_vn"></span> vnđ
                            </li>
                            <li class="list-inline-item">
                                <button type="button" class="btn-submit-all btn btn-lg btn-danger"
                                        style="min-width: 150px;margin-left: 10px; margin-top: 3px">
                                    <span class="fa fa-shopping-basket"></span> Đặt tất cả
                                </button>
                            </li>
                        </ol>
                        <div class="page-title pt-2 checkbox checkbox-primary">
                            <input type="checkbox" id="check_all_shop">
                            <label for="check_all_shop">
                                Chọn tất cả
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- item -->
        @foreach($orders as $order)
            <form method="post" class="form-add" id="form_add_order_{{$order[0]->order_id}}"
                  action="{{ action('Backend\OrderController@addOrder') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$order[0]->status_id}}" name="status_id">
                <input type="hidden" value="{{$order[0]->order_id}}" name="order_info">
                <div class="card-box">
                    <div class="page-header-2">
                        <div class="pull-right mb-0">
                            <a href="javascript:void(0);" class="submit_form"><i style="color: red;font-size: 20px;" class="fa fa-trash"></i> Xóa shop </a>
                        </div>
                        <div class="page-title checkbox checkbox-primary">
                            <input type="checkbox" class="selectedShop" id = "shop_{{$order[0]->order_id}}">
                            <label for="shop_{{$order[0]->order_id}}">
                                Shop: {{$order[0]->shop_name}}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-8 order_detail">
                            <table class="table table-bordered table-sm">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <thead>
                                        <tr class="border-none">
                                            <th></th>
                                            <th data-priority="1">Sản phẩm</th>
                                            <th data-priority="3">Số lượng</th>
                                            <th data-priority="1">Giá (¥)</th>
                                            <th data-priority="3">Thành tiền (¥)</th>
                                            <th data-priority="3">#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order as $key => $item)
                                            <!--table-->
                                            <tr class="custom_height">
                                                <th>
                                                    <div class="checkbox checkbox-primary checkbox-single">
                                                        <input type="hidden" name="array_product[]" class="array_product">
                                                        <input type="checkbox" id="customCheck_{{$item->id}}" class="selected_product">
                                                        <label></label>
                                                    </div>
                                                </th>
                                                <td>
                                                    <ul class="list-inline" >
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
                                                <td>
                                                    <input type="hidden" value="{{$item->number}}" class="old_number">
                                                    <input type="number" value="{{$item->number}}"
                                                           name="detail_number_{{$item->id}}_{{$item->order_id}}"
                                                           class="form-control number_add" min="0"/>
                                                </td>
                                                <input type="hidden" value="{{$item->id}}_{{$item->order_id}}"
                                                       class="order_detail_info">
                                                <td>
                                                    <p class="current_price_cn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_price_cn}}</p>
                                                    <p style="color: red"
                                                       class="font-weight-bold current_price_vn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_price_vn}}</p>
                                                </td>
                                                <input type="hidden" value="{{$item->detail_total_price_cn}}"
                                                       class="total_price_cn"
                                                       name="detail_total_price_cn_{{$item->id}}_{{$item->order_id}}">
                                                <input type="hidden" value="{{$item->detail_total_price_vn}}"
                                                       class="total_price_vn"
                                                       name="detail_total_price_vn_{{$item->id}}_{{$item->order_id}}">
                                                <td>
                                                    <p class="font-weight-bold current_total_price_cn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_total_price_cn}}</p>
                                                    <p style="color: red"
                                                       class="font-weight-bold current_total_price_vn_{{$item->id}}_{{$item->order_id}}">{{$item->detail_total_price_vn}}</p>
                                                </td>
                                                <td class="actions">
                                                    <a href="#" class="on-default remove-row" data-toggle="tooltip"
                                                       data-placement="top" title="" data-original-title="Delete"><i
                                                                class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-none"></td>
                                                <td colspan="5" class="border-none">
                                                    <input class="form-control custom-text-area"
                                                           placeholder="Ghi chú cho sản phẩm"
                                                           value="{{$item->detail_note}}"
                                                           name="detail_note_{{$item->id}}_{{$item->order_id}}">
                                                </td>
                                            </tr>
                                            <!-- end table -->
                                        @endforeach
                                        </tbody>
                                    </div>
                                </div>
                            </table>
                        </div>

                        <!-- form -->
                        <div class="col-12 col-md-4">
                            <div class="card-box" style="background: #efefef; ">
                                <div class="text-right">
                                    <div class="clear-fix row">
                                        <input type="hidden" value="{{$order[0]->number_order}}"
                                               class="total_number_hidden_{{$order[0]->order_id}}">
                                        <label class="col-4 text-right">Số lượng:</label>
                                        <label class="col-8 text-bold total_number_{{$order[0]->order_id}}">{{$order[0]->number_order}}</label>
                                        <input type="hidden" value="{{$order[0]->number_order}}"
                                               name="update_number_{{$order[0]->order_id}}">
                                    </div>
                                    <div class="clear-fix row">
                                        <label class="col-4 text-right">Phí kiểm đếm:</label>
                                        <label class="col-8 text-bold">{{$order[0]->counting_fee}} đ</label>
                                    </div>
                                    <div class="clear-fix row">
                                        <label class="col-4 text-right">Phí đóng gỗ</label>
                                        <label class="col-8 text-bold">{{$order[0]->packing_fee}} đ</label>
                                    </div>
                                    <div class="clear-fix row">
                                        <input type="hidden" value="{{$order[0]->total_price_cn}}"
                                               class="total_price_cn_hidden_{{$order[0]->order_id}}">
                                        <input type="hidden" value="{{$order[0]->total_price_vn}}"
                                               class="total_price_vn_hidden_{{$order[0]->order_id}}">
                                        <label class="col-4 text-right ">Tổng Tiền:</label>
                                        <label class="col-8 text-bold total_price_{{$order[0]->order_id}}">
                                            {{$order[0]->total_price_cn}} ¥ = {{$order[0]->total_price_vn}} đ
                                        </label>
                                        <input type="hidden" value="{{$order[0]->total_price_cn}}"
                                               name="update_price_cn_{{$order[0]->order_id}}">
                                        <input type="hidden" value="{{$order[0]->total_price_vn}}"
                                               name="update_price_vn_{{$order[0]->order_id}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Kho đích:</label>
                                                <div class="col-8">
                                                    <select class="form-control" name="warehouse">
                                                        <option value="KHO HN">KHO HN</option>
                                                        <option value="KHO TPHCM">KHO TPHCM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label" for="example-email">Địa
                                                    chỉ: </label>
                                                <div class="col-8">
                                                    <input type="text" name="received_address"
                                                           class="form-control"
                                                           value="{{$order[0]->received_address}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Ghi chú:</label>
                                                <div class="col-8">
                                                    <textarea class="form-control" name="note"
                                                              style="min-height: 60px">{{$order[0]->note}}</textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$order[0]->product_type}}"
                                                   class="product_type_hidden">
                                            <div class="form-group row product_type">
                                                <div class="checkbox " style="margin-right: 7px">
                                                    <input id="product_type_{{$order[0]->order_id}}_1"
                                                           type="checkbox" name="product_type[]" value="1">
                                                    <label for="product_type_{{$order[0]->order_id}}_1">
                                                        Hàng dễ vỡ
                                                    </label>
                                                </div>
                                                <div class="checkbox" style="margin-right: 7px">
                                                    <input id="product_type_{{$order[0]->order_id}}_2"
                                                           type="checkbox" name="product_type[]" value="2">
                                                    <label for="product_type_{{$order[0]->order_id}}_2">
                                                        Đóng gỗ
                                                    </label>
                                                </div>
                                                <div class="checkbox" style="margin-right: 7px">
                                                    <input id="product_type_{{$order[0]->order_id}}_3"
                                                           type="checkbox" name="product_type[]" value="3">
                                                    <label for="product_type_{{$order[0]->order_id}}_3">
                                                        Kiểm đếm
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div> <!-- end card-box -->
                            <button type="button" class="btn btn-danger waves-effect waves-light submit_order"
                                    data-id="form_add_order_{{$order[0]->order_id}}"
                                    style="min-width: 150px;margin-left: 10px; margin-top: 3px; float: right;">
                                <span class="fa fa-shopping-basket"></span>Đặt hàng
                            </button>
                        </div>
                        <!-- end form -->
                    </div>
                </div>
                <!--end item-->
            </form>
        @endforeach
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
    <script src="{{ asset("backend/plugins/select2/js/select2.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/tinymce/tinymce.min.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>
    <script src="{{ asset("backend/assets/js/cart.js") }}"></script>
    @include('backend.shared.initjs')
@endsection
