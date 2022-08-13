<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset("backend/assets/images/favicon.ico") }}">

    <!--meta tags -->
    <link href=" {{asset("frontend/assets/css/font-awesome.min.css") }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/flaticon.css") }} " rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href=" {{asset("frontend/assets/css/bootstrap.min.css") }} " rel="stylesheet">
    <!-- Plugins for this template -->
    <link href=" {{asset("frontend/assets/css/animate.css") }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/owl.carousel.css") }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/odometer-theme-default.css") }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/slick.css") }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/slick-theme.css" ) }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/slicknav.min.css") }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/jquery.fancybox.css") }} " rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=" {{asset("frontend/assets/css/style.css" ) }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/custom.css" ) }} " rel="stylesheet">
    <link href=" {{asset("frontend/assets/css/responsive.css") }} " rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>
<body class="fixed-left" name="@yield('body-name')">
<div class="page-loader">
    <div class="page-loader-inner">
        <div class="inner"></div>
    </div>
</div>
<!-- end page-loader -->
<!-- header-area start -->
<header>
    <div class="header-area" id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-9 col-sm-9 col-9">
                    <div class="logo">
                        <a href="/"><img src="{{asset("frontend/assets/images/logo/logo.png")}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 d-none d-lg-block">
                    <div class="main-menu">
                        <nav class="nav_mobile_menu">
                            <ul>
                                <li class="active"><a href="/">Trang chủ</a>
                                </li>
                                <li><a href="{{action('GuideController@index')}}">Hướng dẫn</a>
                                    <ul class="submenu">
                                        @foreach(Helper::getNewsByCategory(5, 'huong-dan-mua-hang') as $news)
                                        <li><a href="{{action('NewsController@detail', $news->slug)}}">{{$news->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{action('AboutController@index')}}">Về chúng tôi</a></li>
                                <li><a href="/#dich-vu">Dịch vụ</a>
                                </li>
                                <li><a href="{{action('NewsController@index')}}">Tin tức</a>
                                </li>
                                @if(session('current_user'))
                                    <li><a href="">Xin chào, {{session('current_user')->name}}</a></li>
                                @else
                                    <li><a href="{{action('Auth\RegisterController@showRegisterFrom')}}">Đăng kí</a>
                                    </li>
                                    <li><a href="/backyard">Đăng nhập</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none">
                    <div class="mobile_menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area end -->
<!-- Begin page -->
@yield('content')
<!-- .footer-area start -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="100995841642662"
     logged_in_greeting="Xin chào, tôi có thể hỗ trợ gì cho bạn không?"
     logged_out_greeting="Xin chào, tôi có thể hỗ trợ gì cho bạn không?">
</div>
<div class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 footer-t">
                    <div class="footer-logo">
                        <img src="{{asset("frontend/assets/images/logo/logo.png")}}" alt="">
                    </div>
                    <p>Đặt hàng siêu tốc là công ty logistics hàng đầu trong lĩnh vực vận chuyển hàng hóa Việt - Trung. Là đơn vị uy tín lâu năm trên thị trường cung cấp dịch vụ đặt hàng order, vận chuyển hàng hóa từ các sàn thương mại điện tử lớn nhất Trung Quốc về Việt Nam.</p>
                    <div class="social">
                        <ul class="d-flex">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer-b">
                    <div class="Recent-News-area">
                        <h3>Bạn cần biết</h3>
                        @foreach(\App\Helper::getNews(2) as $footer_news)
                            <div class="resent-sub">
                                <a href="{{action('NewsController@detail', $footer_news->slug)}}"><p>{{$footer_news->title}}</p></a>
                                <span><i class="fa fa-clock-o custom-fa-clock float-left" aria-hidden="true"></i> <p class="next-clock">{{date('Y-m-d', strtotime($footer_news->created_at))}}</p></span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 footer-t">
                    <div class="footer-link">
                        <h3>Liên kết</h3>
                        <ul>
                            <li class="active"><a href="/">Trang chủ</a>
                            </li>
                            <li><a href="#">Hướng dẫn</a>
                            </li>
                            <li><a href="{{action('AboutController@index')}}">Về chúng tôi</a></li>
                            <li><a href="/#service">Dịch vụ</a>
                            </li>
                            <li><a href="{{action('NewsController@index')}}">Tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <h3>Liên hệ</h3>
                    <div class="fb-page"
                         data-href="https://www.facebook.com/%C4%90%E1%BA%B7t-h%C3%A0ng-si%C3%AAu-t%E1%BB%91c-100995841642662/?modal=admin_todo_tour"
                         data-tabs="" data-width="" data-height="" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/%C4%90%E1%BA%B7t-h%C3%A0ng-si%C3%AAu-t%E1%BB%91c-100995841642662/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/%C4%90%E1%BA%B7t-h%C3%A0ng-si%C3%AAu-t%E1%BB%91c-100995841642662/?modal=admin_todo_tour">Đặt hàng siêu tốc</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="row">
                    <div class="col-12">
                        <span>Copyright © Đặt hàng siêu tốc 2012. All right reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .footer-area end -->
<!-- END wrapper -->
<script src="{{asset("frontend/assets/js/jquery.min.js") }} "></script>
<script src="{{asset("frontend/assets/js/bootstrap.min.js") }} "></script>
<!-- Plugins for this template -->
<script src="{{asset("frontend/assets/js/jquery-plugin-collection.js") }} "></script>
<script src="{{asset("frontend/assets/js/jquery.slicknav.min.js") }} "></script>
<!-- Custom script for this template -->
<script src="{{asset("frontend/assets/js/script.js") }} "></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=333211210464297&autoLogAppEvents=1"></script>
@yield('javascript')
</body>
</html>
