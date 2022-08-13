@extends('frontend.layout')
@section('title', 'Trang chủ')
@section('body-name', 'home')
@section('css')

@endsection

@section('content')
    <!-- start page-loader -->
    <!-- start of hero -->
    <section class="hero hero-slider-wrapper hero-style-1 hero-style-2">
        <div class="hero-slider">
            <div class="slide">
                <img src="{{asset("frontend/assets/images/slider/1.jpg" )}}" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-9 slide-caption">
                            <h2><span>Dịch vụ Order</span> <span>Taobao, 1688, tmail.</span></h2>
                            <div class="btns">
                                <div class="btn-style"><a href="#">Chúng tôi cam kết làm việc tận tâm, mang đến dịch vụ
                                        tốt nhất cho khách hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <img src="{{asset("frontend/assets/images/slider/2.jpg")}}" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-9 slide-caption">
                            <h2><span>Nạp tiền Alipay</span> <span>Chuyển tiền, hỗ trợ mua hàng.</span></h2>
                            <div class="btns">
                                <div class="btn-style"><a href="#">Khiến công việc mua sắm của bạn trở nên đơn giản, dễ
                                        dàng hơn</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <img src="{{asset("frontend/assets/images/slider/3.jpg")}}" alt class="slider-bg">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-9 slide-caption">
                            <h2><span>Dịch vụ chuyển phát nhanh</span> <span>Cho thuê kho, tư vấn nhập hàng.</span></h2>
                            <div class="btns">
                                <div class="btn-style"><a href="#">Tối ưu chi phí, lợi ích thiết thực</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of hero slider -->
    <!-- section-section start -->
    <div class="section-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-d">
                    <div class="section-item">
                        <div class="section-icon">
                            <i class="fi flaticon-ship"></i>
                        </div>
                        <div class="section-content">
                            <p><a href="#">Đặt hàng</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-d">
                    <div class="section-item">
                        <div class="section-icon">
                            <i class="fi flaticon-truck"></i>
                        </div>
                        <div class="section-content">
                            <p><a href="#">Vận chuyển hàng hoá</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-d">
                    <div class="section-item">
                        <div class="section-icon">
                            <i class="fi flaticon-plane"></i>
                        </div>
                        <div class="section-content">
                            <p><a href="#">Đơn hàng kí gửi</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-d">
                    <div class="section-item">
                        <div class="section-icon">
                            <i class="fi flaticon-delivery"></i>
                        </div>
                        <div class="section-content">
                            <p><a href="#">Cho thuê kho</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--section-section end -->
    <!-- .about-area start -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset("frontend/assets/images/about/about.svg")}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 sec-p">
                    <div class="about-content">
                        <div class="about-icon">
                            <i class="fi flaticon-travel"></i>
                        </div>
                        <h2>Phương châm hoạt động</h2>
                        <p>An toàn khi giao dịch, chi phí tốt, khách hàng là trung tâm.</p>
                        <span>Hợp tác cùng phát triển</span>
                        <span>Luôn trả lời mọi thắc mắc của khách hàng về sản phẩm/đơn hàng.</span>
                        <span>Tư vấn nhiệt tình chu đáo, đơn hàng được theo dõi và kiểm tra liên tục nhằm giúp khách hàng có thông tin sớm nhất về sản phẩm và thời hạn giao hàng.</span>
                    </div>
                    <div class="signature-section">
                        <div class="si-text">
                            <p>Hotline</p>
                            <span>0966 608 954 & 0974 611 611</span>
                        </div>
                        <img src="{{asset("frontend/assets/images/about/1.png")}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->
    <!-- service-area start-->
    <div class="service-area service-s2" id="dich-vu">
        <div class="container">
            <div class="col-l2">
                <div class="section-title text-center">
                    <span>Phục vụ tận tâm</span>
                    <h2>Dịch vụ của chúng tôi</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-item">
                        <div class="service-single">
                            <div class="service-icon">
                                <i class="fi flaticon-truck"></i>
                            </div>
                            <h2>Dịch Vụ Order</h2>
                            <p>Chúng tôi cung cấp dịch vụ order hàng hoá trên các trang thương mại điện tử taobao,
                                1688.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-item">
                        <div class="service-single">
                            <div class="service-icon">
                                <i class="fi flaticon-ship"></i>
                            </div>
                            <h2>Thanh Toán Hộ</h2>
                            <p>Chúng tôi nhận thanh toán hộ các đơn hàng mà quý khách đã lên vận đơn với nhà cung
                                cấp.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-item">
                        <div class="service-single">
                            <div class="service-icon">
                                <i class="fi flaticon-plane"></i>
                            </div>
                            <h2>Cho Thuê Kho, Lưu Trữ</h2>
                            <p>Dịch vụ cho thuê kho vận, lưu trữ, kiểm đếm, đóng gói hàng hoá gửi về Việt Nam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-item">
                        <div class="service-single">
                            <div class="service-icon">
                                <i class="fi flaticon-construction"></i>
                            </div>
                            <h2>Phiên Dịch</h2>
                            <p>Dẫn khách phiên dịch, mua bán tại Trung Quốc và Việt Nam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-item">
                        <div class="service-single">
                            <div class="service-icon">
                                <i class="flaticon-truck-2"></i>
                            </div>
                            <h2>Thông Quan</h2>
                            <p>Dịch vụ thông quan hàng hoá đường bộ, đường biển..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-item">
                        <div class="service-single">
                            <div class="service-icon">
                                <i class="flaticon-trolley"></i>
                            </div>
                            <h2>CPN Trung Quốc</h2>
                            <p>Dịch vụ chuyển phát nhanh siêu tốc Trung Quốc - Việt Nam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-area end-->
    <!-- start track-section -->
    {{--    <section class="track-section">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-9">--}}
    {{--                    <div class="track">--}}
    {{--                        <h3>Tra cứu đơn hàng</h3>--}}
    {{--                        <div class="tracking-form">--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-lg-4 col-md-4 col-sm-6">--}}
    {{--                                    <form>--}}
    {{--                                        <input type="text" class="form-control" placeholder="Email">--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-lg-4 col-md-4 col-sm-6">--}}
    {{--                                    <form>--}}
    {{--                                        <input type="text" class="form-control" placeholder="Mã đơn hàng">--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}

    {{--                                <div class="col-lg-3 col-md-4 col-sm-6">--}}
    {{--                                    <button type="submit">Xem ngay</button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!-- end container -->--}}
    {{--    </section>--}}
    <!-- end track-section -->
    <!-- feature-area start -->
    <div class="features-area features-style-2">
        <div class="container">
            <div class="section-title text-center">
                <!--<span>We Provide the Best</span>-->
                <h2>Đặt hàng & nhận hàng</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="features-item features-item-2">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="feature-wrap">
                                <div class="features-icon features-icon2">
                                    <i class="fi flaticon-plane"></i>
                                </div>
                                <div class="features-text">
                                    <h3>Chọn sản phẩm</h3>
                                    <p>Khách hàng chọn sản phẩm trên các websites thương mại điện tử taobao, 1688,
                                        tmail</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="feature-wrap">
                                <div class="features-icon feature-icon3">
                                    <i class="fi flaticon-truck"></i>
                                </div>
                                <div class="features-text">
                                    <h3>Cho vào giỏ hàng</h3>
                                    <p>Khách hàng cho sản phẩm vào giỏ hàng bằng phần mềm hỗ trợ
                                        dathangsieutoc-extension</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="features-item">
                        <div class="feature-img">
                            <img src="{{asset("frontend/assets/images/features/1.png")}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-item">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="feature-wrap">
                                <div class="features-icon">
                                    <i class="fi flaticon-ship"></i>
                                </div>
                                <div class="features-text">
                                    <h3>Kiểm tra & đặt hàng</h3>
                                    <p>Khách hàng kiểm tra lại thông tin sản phẩm: màu sắc, số lượng, đơn giá và tiến
                                        hành đặt hàng.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="feature-wrap">
                                <div class="features-icon">
                                    <i class="fi flaticon-truck-1"></i>
                                </div>
                                <div class="features-text">
                                    <h3>Theo dõi đơn hàng</h3>
                                    <p>Đặt hàng siêu tốc cung cấp hệ thống tracking để khách hàng theo dõi đơn hàng theo
                                        thời gian thực</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature-area start -->
    <!-- counter-area start -->
    <div class="counter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="counter-content">
                        <h2>Câu chuyện chúng tôi muốn chia sẻ với bạn...</h2>
                        <p>Đơn hàng siêu tốc hiểu rằng, quý khách hàng có rất nhiều ý tưởng kinh doanh, nhưng lại chưa
                            tìm được nguồn hàng phù hợp.
                            Quý khách còn đang lo lắng tìm kiếm đơn vị vận chuyển uy tín, làm việc với thái độ cầu thị,
                            luôn trung thực và coi lợi ích của khách hàng là điều tiên quyết xây dựng doanh nghiệp bền
                            vững.
                        </p>
                        <p>HÃY ĐỂ CHÚNG TÔI PHỤC VỤ BẠN.</p>
                        <div class="btns">
                            <div class="btn-style btn-style-3"><a href="#">0966 608 954 Nhận tư vấn ngay...</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="counter-grids">
                        <div class="grid">
                            <div>
                                <h2><span class="odometer" data-count="4,012">00</span></h2>
                            </div>
                            <p>Đơn hàng đã giao dịch</p>
                        </div>
                        <div class="grid">
                            <div>
                                <h2><span class="odometer" data-count="605">00</span></h2>
                            </div>
                            <p>Lượt thành toán</p>
                        </div>
                        <div class="grid">
                            <div>
                                <h2><span class="odometer" data-count="920">00</span></h2>
                            </div>
                            <p>Đối tác trung quốc</p>
                        </div>
                        <div class="grid">
                            <div>
                                <h2><span class="odometer" data-count="3,592">00</span></h2>
                            </div>
                            <p>Đối tác Việt Nam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter-area end -->
    <!-- pice-area start -->
    <div class="pricing-area">
        <div class="container">
            <div class="section-title text-center">
                <h2>Bảng giá</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach($option as $item)
                            <div class="col-lg-4 col-l2 col-md-6 col-sm-6">
                                <div class="price-item">
                                    <div class="pricing-header">
                                        <h3>{{$item->title}}</h3>
                                    </div>
                                    <div class="pricing-table">
                                        <div class="price-sub-header">
                                            <h4>{{$item->header}}</h4>
                                        </div>
                                        <ul>
                                            @foreach($item->content as $content)
                                            <li>{{$content}}</li>
                                            @endforeach
                                        </ul>
                                        <div class="pricing-footer">
                                            <div class="btns">
                                                <div class="btn-style btn-style-4"><a href="#">Giá tốt hơn</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pice-area end -->
    <!-- testimonial-area start -->
    <div class="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="testimonial-active owl-carousel">
                        <div class="testimonial-wrap">
                            <div class="testimonial-img">
                                <img src="{{asset("frontend/assets/images/testimonial/c3.jpg")}}" alt="">
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <p>Khi mới mở shop thời trang, tôi chưa tìm được nguồn hàng phù hợp. Nhờ tư vấn của
                                        Đặt hàng siêu tốc tôi đã lấy được nguồn hàng tốt, giá phải chăng để phát triển
                                        cửa hiệu cá nhân. Cảm ơn Đặt hàng siêu tốc rất nhiều.</p>
                                    <h4>Nguyễn Hoàng Minh Ngọc</h4>
                                    <span>Shop thời trang mẹ nhím</span>
                                </div>
                            </div>
                            <div class="test-c d-none d-lg-block"></div>
                            <div class="test-b d-none d-lg-block"></div>
                        </div>
                        <div class="testimonial-wrap">
                            <div class="testimonial-img">
                                <img src="{{asset("frontend/assets/images/testimonial/c2.jpg")}}" alt="">
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <p>Vốn quen mua hàng trên các trang thương mại điện tử 1688, taobao. Nhưng tôi chưa
                                        tìm được giải pháp giao vận phù hợp nào cho tới khi làm việc với Đặt hàng siêu
                                        tốc. Các bạn đã giúp đỡ tôi rất nhiều trong quá trình vận chuyển hàng hoá về
                                        Việt Nam. Xin cảm ơn.</p>
                                    <h4>Chị Đào Lê</h4>
                                    <span>Kinh doanh tự do</span>
                                </div>
                            </div>
                            <div class="test-c d-none d-lg-block"></div>
                            <div class="test-b d-none d-lg-block"></div>
                        </div>
                        <div class="testimonial-wrap">
                            <div class="testimonial-img">
                                <img src="{{asset("frontend/assets/images/testimonial/c1.jpg")}}" alt="">
                            </div>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <p>Sử dụng dịch vụ của Đặt hàng siêu tốc, hàng hoá được vận chuyển rất nhanh, đóng
                                        gói cẩn thận. Ngoài ra các bạn tư vấn của Đặt hàng siêu tốc cũng rất nhiệt tình
                                        hỗ trợ khi tôi có vướng mắc với chủ xưởng bên Trung Quốc. Chân thành cảm ơn Đặt
                                        hàng siêu tốc và chúc các bạn ngày càng phát triển.</p>
                                    <h4>Lê Phương Anh</h4>
                                    <span>Chủ chuỗi cửa hàng bánh ngọt Phương Lê</span>
                                </div>
                            </div>
                            <div class="test-c d-none d-lg-block"></div>
                            <div class="test-b d-none d-lg-block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial-area end -->
    <!-- team-area start -->
    <!-- populer-area end -->
    <div class="team-area team-area-2">
        <div class="container">
            <div class="col-l2">
                <div class="section-title text-center">
                    <h2>Hướng dẫn mua hàng</h2>
                </div>
            </div>
            <div class="row">
                @foreach($shopping_guide as $news)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="team-single">
                            <div class="team-img">
                                <img src="{{$news->featured_img}}" alt="">
                            </div>
                            <div class="team-content">
                                <h4> <a href="{{action('NewsController@detail', $news->slug)}}">{{$news->title}}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- start track-section -->
    <!-- end track-section -->
    <!-- All JavaScript files
    ================================================== -->
@endsection

@section('javascript')
    <script>
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll == 0) {
                $('.header-area').css('background-color', 'rgba(255, 255, 255, 0.10)');
            } else {
                $('.header-area').css('background-color', '#142440');
            }
        });
    </script>
@endsection