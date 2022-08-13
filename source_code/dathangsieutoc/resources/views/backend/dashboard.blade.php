@extends('backend.layout')
@section('title', 'Bảng tin')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/plugins/morris/morris.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')

    <div class="container-fluid">
    <input type="hidden" id="sessionData" value="{{$session_api}}"/>
    <input type="hidden" id="user_id" value="{{$user_id}}"/>
    {{ csrf_field() }}
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
               <h4 class="page-title pb-3">Chào mừng bạn đến với đặt hàng siêu tốc</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-pink pull-left">
                        <i class="md md-add-shopping-cart text-pink"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$order_number}}</b></h3>
                        <p class="text-muted mb-0">Tổng số đơn đã đặt cọc</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-success pull-left">
                        <i class="md md-remove-red-eye text-success"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$complain_order_number}}</b></h3>
                        <p class="text-muted mb-0">Tổng số đơn khiếu nại</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-info pull-left">

                        <i class="md md-attach-money text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$total_money_in_month}}</b></h3>
                        <p class="text-muted mb-0">Số tiền giao dịch trong tháng</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="widget-bg-color-icon card-box">
                    <div class="bg-icon bg-icon-purple pull-left">
                        <i class="md md-equalizer text-purple"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b class="counter">{{$total_transaction_in_month}}</b></h3>
                        <p class="text-muted mb-0">Số lượng giao dịch trong tháng</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row p-t-3">
            <div class="col-lg-12 col-sm-12">
                <div class="card-box">
                    @if($is_admin)
                    <a href="{{action('Backend\HistoryTransactionController@adminIndex')}}" class="pull-right btn btn-default btn-sm waves-effect waves-light">Xem tất cả</a>
                    @else
                    <a href="{{action('Backend\HistoryTransactionController@index')}}" class="pull-right btn btn-default btn-sm waves-effect waves-light">Xem tất cả</a>
                    @endif
                    <h4 class="text-dark header-title m-t-0 m-b-30">Danh sách 10 giao dịch cuối cùng</h4>
                    <div class="table-responsive">
                        <table class="table table-actions-bar m-b-0">
                            <thead>
                                <tr>
                                    <th>Mã GD</th>
                                    <th>Loại giao dịch</th>
                                    <th>Giá trị GD</th>
                                    <th>Số dư cuối</th>
                                    <th>Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($history_transactions))
                                    @foreach($history_transactions as $history_transaction)
                                    <tr>
                                        <td>{{$history_transaction->transaction_code}}</td>
                                        <td>{{$history_transaction->transaction_status_name}}</td>
                                        <td><b class="money_type2">{{$history_transaction->transaction_price}}</b><em>đ</em></td>
                                        <td><b class="money_type2">{{$history_transaction->last_balance}}</b><em>đ</em></td>
                                        <td>{{$history_transaction->note}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                        </table>
<!--                         <table id="grid" class="table-bordered"
                               data-toggle="table"
                               data-search="false"
                               data-show-refresh="false"
                               data-show-toggle="false"
                               data-show-columns="false"
                               data-show-pagination-switch="false"
                               data-ajax="callAjaxRequest"
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
                    </table> -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->

@endsection

@section('javascript')
    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->

    <script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/morris/morris.min.js") }}"></script>

    <script src="{{ asset("backend/assets/js/popper.min.js") }}"></script><!-- Popper for Bootstrap -->
    <script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/detect.js") }}"></script>
    <script src="{{ asset("backend/assets/js/fastclick.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.slimscroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.blockUI.js") }}"></script>
    <script src="{{ asset("backend/assets/js/waves.js") }}"></script>
    <script src="{{ asset("backend/assets/js/wow.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.nicescroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.scrollTo.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>
    <script src="{{ asset("backend/plugins/peity/jquery.peity.min.js") }}"></script>

    <!-- jQuery  -->
    <script src="{{ asset("backend/plugins/waypoints/lib/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/counterup/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/counterup/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/raphael/raphael-min.js") }}"></script>

    <script src="{{ asset("backend/plugins/jquery-knob/jquery.knob.js") }}"></script>

    <script src="{{ asset("backend/assets/pages/jquery.dashboard.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>



    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
            $('.money_type2').each(function () {
                let number = Math.abs($(this).text());
                let operator = '';
                if(number != $(this).text()) {
                    operator = '-';
                }
                $(this).text(operator + changeNumberType(number));
            });
            $(".knob").knob();

        });

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
