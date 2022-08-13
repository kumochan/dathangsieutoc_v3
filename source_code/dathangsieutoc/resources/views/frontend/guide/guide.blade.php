@extends('frontend.layout')
@section('title', 'Hướng dẫn')
@section('css')
@endsection
@section('content')
    <div class="blog-page-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="blog-left-bar">
                        @foreach($news as $new)
                            <div class="blog-item">
                                <div class="blog-img">
                                    <div class="blog-s2">
                                        <img src="{{$new->featured_img}}" alt="">
                                    </div>
                                    <ul class="post-meta">
                                        <li><img src="{{$new->user->avata}}" alt=""></li>
                                        <li><a href="#">{{$new->user->name}}</a></li>
                                        <li> {{date('Y-m-d', strtotime($new->created_at))}}</li>
                                    </ul>
                                </div>
                                <div class="blog-content-2">
                                    <h2>{{$new->title}}</h2>
                                    <p>{{$new->excerpt}}</p>
                                    <a href="{{action('NewsController@detail', $new->slug)}}">Đọc tiếp..</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            {{$news->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="blog-right-bar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="category-section catagory-item">
                                    <h3 class="text-left">Tin mới</h3>
                                    <div class="posts">
                                        @foreach($recent_news as $recent)
                                            <div class="post post2">
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
    <script src="{{asset("frontend/assets/js/news.js") }} "></script>
@endsection