@extends('frontend.layout')
@section('title', 'Bài viết')
@section('css')
@endsection
@section('content')
    <div class="blog-page-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="blog-left-bar">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="blog-s2">
                                    <img src="{{$news->featured_img}}" alt="">
                                </div>
                                <ul class="post-meta">
                                    <li><img src="{{$news->user->avata}}" alt=""></li>
                                    <li><a href="#">{{$news->user->name}}</a></li>
                                    <li>{{date('Y-m-d', strtotime($news->created_at))}}</li>
                                </ul>
                            </div>
                            <div class="blog-content-2">
                                <h2>{{$news->title}}</h2>
                            </div>
                            {!!  $news->content !!}
                        </div>
                        @if(!empty($news->tags))
                            <div class="tag-share">
                                <div class="tag">
                                    <ul>
                                        @foreach($news->tags as $tag)
                                            <li><a href="#">{{$tag}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
{{--                        <div class="author-box">--}}
{{--                            <div class="author-avatar">--}}
{{--                                <a href="#" target="_blank"><img src="{{$news->user->avata}}" alt></a>--}}
{{--                            </div>--}}
{{--                            <div class="author-content">--}}
{{--                                <a href="#" class="author-name">{{$news->user->name}}</a>--}}
{{--                                <p>I will give you a complete account of the system, and expound the actual teachings of--}}
{{--                                    the great explorer of the truth,</p>--}}
{{--                                <div class="socials">--}}
{{--                                    <ul class="social-lnk">--}}
{{--                                        <li><a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div> <!-- end author-box -->--}}
                        @if($next_news_slug != null || $previous_news_slug != null)
                            <div class="more-posts">
                                @if($previous_news_slug != null)
                                    <div class="previous-post">
                                        <a href="{{action('NewsController@detail', $previous_news_slug)}}">
                                            <span class="post-control-link"><i class="fa fa-long-arrow-left"></i>Bài viết trước</span>
                                        </a>
                                    </div>
                                @endif
                                @if($next_news_slug != null)
                                    <div class="next-post">
                                        <a href="{{action('NewsController@detail', $next_news_slug)}}">
                                        <span class="post-control-link">Bài viết tiếp theo<i
                                                    class="fa fa-long-arrow-right"></i></span>
                                        </a>
                                    </div>
                                @endif
                            </div> <!-- end more-posts -->
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="blog-right-bar">
                        <div class="row">
                            {{--                            <div class="col-lg-12 col-md-6">--}}
                            {{--                                <div class="catagory-item">--}}
                            {{--                                    <div class="widget-title">--}}
                            {{--                                        <h3 class="text-left">Tin mới</h3>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="category-section">--}}
                            {{--                                        <ul>--}}
                            {{--                                            @foreach($categories as $category)--}}
                            {{--                                                <li><a href="#">{{$category->name}}</a></li>--}}
                            {{--                                            @endforeach--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="col-lg-12 col-md-6">
                                <div class="category-section catagory-item">
                                    <h3 class="text-left">Tin mới</h3>
                                    <div class="posts">
                                        @foreach($recent_news as $recent)
                                            <div class="post">
                                                <div class="img-holder">
                                                    <img src="{{$recent->featured_img}}"
                                                         alt>
                                                </div>
                                                <div class="details">
                                                    <p>{{$recent->title}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection