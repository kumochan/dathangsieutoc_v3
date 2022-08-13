@extends('frontend.layout')
@section('title', 'Về chúng tôi')
@section('css')
@endsection
@section('content')
    <!-- .about-area start -->
    <div class="about-area  about-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  offset-lg-6 about-wrap">
                    <div class="about-content">
                        <div class="about-icon">
                            <i class="fi flaticon-travel"></i>
                        </div>
                        <h2>Chúng tôi là ai?</h2>
                        <p>Đặt hàng siêu tốc là công ty logistics hàng đầu trong lĩnh vực vận chuyển hàng hóa Việt -
                            Trung. Là đơn vị uy tín lâu năm trên thị trường cung cấp dịch vụ đặt hàng order, vận chuyển
                            hàng hóa từ các sàn thương mại điện tử lớn nhất Trung Quốc về Việt Nam.</p>
                        <p>Với hơn nhiều năm kinh nghiệm, cùng với đội ngũ nhân viên nhiệt tình, am hiểu tiếng và nguồn
                            hàng hóa Trung Quốc, Đặt hàng siêu tốc mang sứ mệnh “Đem đến cho khách hàng một dịch vụ
                            chuyên nghiệp, hỗ trợ người mua hàng một cách tối đa cùng mức phí tốt nhất”.</p>
                        <span>Chúng tôi cam kết đặt lợi ích của khách hàng lên trước</span>
                        <span>Tận tâm với sản phẩm và dịch vụ mình cung cấp.</span>
                        <span>Sẵn sàng hỗ trợ tối đa với các yêu cầu của khách hàng.</span>
                    </div>
                    <div class="signature-section">
                        <div class="si-text">
                            <p>Thuỳ Dung</p>
                            <span>Chairman & Chief Executive Officer</span>
                        </div>
                        <img src="assets/images/about/2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->
    <!-- service-area start-->
    <div class="blog-area blog-style-2">
        <div class="container">
            <div class="col-l2">
                <div class="section-title text-center">
                    <span>Lời khuyên của chúng tôi</span>
                    <h2>Bạn cần biết</h2>
                </div>
            </div>
            <div class="row">
                @foreach(\App\Helper::getNews(3) as $news)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{$news->featured_img}}" alt="">
                                <div class="blog-s-text">
                                    <div class="blog-content">
                                        <h3>{{$news->title}}</h3>
                                    </div>
                                    <div class="blog-content-sub blog-content-sub-2">
                                        <ul>
                                            <li><a href="{{action('NewsController@detail', $news->slug)}}">Hướng dẫn</a>
                                            </li>
                                            <li>{{$news->created_at}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-content blog-content2">
                                        <h3>
                                            <a href="{{action('NewsController@detail', $news->slug)}}">{{$news->title}}</a>
                                        </h3>
                                        <p>{{$news->excerpt}}</p>
                                        <a href="{{action('NewsController@detail', $news->slug)}}">Đọc tiếp...</a>
                                    </div>
                                    <div class="blog-content-sub blog-content-sub-2">
                                        <ul>
                                            <li>{{$news->created_at}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    <!-- service-area end-->
    <!-- All JavaScript files
@endsection
@section('javascript')
@endsection