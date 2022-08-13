<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset("backend/assets/images/favicon.ico") }}">
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css") }}"/>
    @yield('css')


</head>
<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ \App\Helper::currentRoutePrefix() }}" class="logo"><i
                            class="icon-magnet icon-c-logo"></i><span>ĐHST<i
                                class="md md-album"></i></span></a>

            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item info-box-number text-red"
                    style="font-size: 15px; color: white; font-weight: bold">
                    Tỷ giá: {{ \App\Option::getOptionWithoutCache('exchange_rate') }} CNY
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                       href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        {{--<img src="{{ asset("backend/assets/images/users/avatar-1.jpg") }}" alt="user"--}}
                        {{--class="rounded-circle">--}}
                        <i class="dripicons-user noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- item-->
                        <a href="{{ action('Backend\UserController@showChangePassword') }}"
                           class="dropdown-item notify-item">
                            <i class="md md-account-circle"></i> <span>Tài khoản</span>
                        </a>

                        <!-- item-->
                        <a href="{{ action('Backend\AuthController@logout') }}" class="dropdown-item notify-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="md md-settings-power"></i> <span>Logout</span>
                            <form id="logout-form" action="{{ action('Backend\AuthController@logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
                <li class="hide-phone app-search d-none">
                    <form role="search" class="">
                        <input type="text" placeholder="tìm kiếm ..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

        </nav>

    </div>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title" style="font-size: 14px">
                        <div class="text-center pb-3">
                            <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </div>
                        <div class="text-center"><i class="fa fa-money"></i>
                            Số dư: <b class="money_type">{{\App\Wallet::getCurrentBalance()}}</b><em>đ</em>
                        </div>
                    </li>
                    <li class="has_sub"><a href="{{ action('Backend\BackendController@dashboard') }}"
                                           class="waves-effect parent_menu"><i
                                    class="ti-home"></i><span>Thông tin chung</span></a></li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="ti-truck"></i>
                            <span>Đặt hàng</span><span class="menu-down"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{ action('Backend\OrderController@cart') }}"><i class="ti-shopping-cart"></i>Giỏ
                                    hàng</a></li>
                            <li><a href="javascript:void(0);"><i class="ti-plus"></i>Tạo đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i> <span>Quản lý đơn hàng</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('orderTotal') }}"><i class="ti-menu"></i>Tất cả đơn hàng</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 1) }}"><i class="ti-flag-alt"></i>Chờ
                                    đặt cọc</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 2) }}"><i class="ti-flag-alt"></i>Đã
                                    đặt cọc</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 3) }}"><i class="ti-truck"></i>Đang
                                    đặt hàng</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 4) }}"><i class="ti-check-box"></i>Đã
                                    đặt hàng</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 5) }}"><i class="ti-package"></i>Shop
                                    xưởng giao</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 6) }}"><i class="ti-package"></i>Đang
                                    vận chuyển</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 7) }}"><i class="ti-package"></i>Kho
                                    VN nhận</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 8) }}"><i class="ti-back-right"></i>Đã
                                    trả hàng</a></li>
                            <li><a href="{{ action('Backend\OrderController@index', 9) }}"><i class="ti-close"></i>Đã
                                    hủy</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"> <i class="ti-wallet"></i>
                            <span>Ví điện tử</span></a>
                        <ul class="list-unstyled">
                            @if(\Illuminate\Support\Facades\Auth::user()->can('edit-history-transaction'))
                            <li><a href="{{ action('Backend\HistoryTransactionController@adminIndex') }}"><i class="ti-menu"></i>Lịch sử giao dịch</a></li>
                            @else
                            <li><a href="{{ action('Backend\HistoryTransactionController@index') }}"><i class="ti-menu"></i>Lịch sử giao dịch</a></li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->can('edit-history-transaction'))
                            <li><a href="{{ action('Backend\HistoryTransactionController@add') }}"><i class="fa fa-plus"></i>Thêm mới giao dịch</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="has_sub"><a href="{{ action('Backend\OrderController@getComplainOrder') }}" class="waves-effect"> <i class="ti-face-sad"></i>
                            <span>Đơn hàng khiếu nại</span></a></li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect" style="color: red"> <i class="ti-money"></i>
                            Tỷ giá: {{ \App\Option::getOptionWithoutCache('exchange_rate') }} CNY
                        </a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->can('list-news'))
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Bài viết</span><span class="menu-down"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li><a href="{{ action('Backend\NewsController@showAddForm') }}"><i
                                                class="ti-plus"></i>Thêm bài viết</a></li>
                                <li><a href="{{ action('Backend\NewsController@index') }}"><i
                                                class="fa fa-newspaper-o"></i>Danh
                                        sách bài viết</a></li>
                                <li><a href="{{ action('Backend\NewsController@showEditCategoryForm', 1) }}"><i
                                                class="fa fa-tasks"></i>
                                        Danh mục</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->can('edit-option'))
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="fa fa-cogs"></i>
                                <span>Tùy chỉnh</span><span class="menu-down"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li><a href="{{ action('Backend\OptionsController@index') }}"><i
                                                class="fa fa-wrench"></i>Sửa thông tin</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"> <i class="ti-user"></i>
                            <span>Thông tin cá nhân</span></a></li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="ti-user"></i>
                            <span>Người dùng</span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{ action('Backend\UserController@index') }}"><i
                                class="fa fa-wrench"></i>Danh sách người dùng</a></li>
                        </ul>
                    </li>
                    <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"> <i class="ti-email"></i>
                            <span>Liên hệ</span></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            @yield('content')

        </div> <!-- content -->

    </div>
</div>
<!-- END wrapper -->

@yield('javascript')
<script src="{{ asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
<script>
    $('.money_type').each(function () {
        $(this).text(changeNumberType($(this).text()));
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
</body>
</html>
