@extends('backend.layout')
@section('title', 'Thêm menu')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>

    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    {{--<a href="{{ action('Backend\NewsController@category') }}" class="btn btn-default">--}}
                    <i class="fa fa-plus"></i></a>
                </div>

                <h4 class="page-title">Thêm menu</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\MenuController@index') }}">Menus</a></li>
                    <li class="breadcrumb-item active">Thêm menu</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add" action="{{ action('Backend\MenuController@add') }}">
            @csrf
            <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">
                        {{--<input type="hidden" id="id" name="id" value="{{ $term->id }}">--}}
                        <div class="form-group">
                            @include('backend.shared.flash-message')
                        </div>

                        <div class="form-group">
                            <label for="name">Tiêu đề<span class="text-danger">*</span></label>
                            <input type="text" id="js-name" name="name" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Khoá thay thế<span class="text-danger">*</span></label>
                            <input type="text" id="js-slug" name="slug" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('slug') }}">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Menu cấp cha<span class="text-danger">*</span></label>
                            <select id="js-parent-id" name="parent_id" class="form-control"
                                    data-style="btn-white">
                                {{ $menus = \App\Menu::getMenu(Session::get('locale'),'frontend_menu') }}
                                @foreach($menus as $item)
                                    @if($item->id == old('term_id'))
                                        <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order_index">Thứ tự<span class="text-danger">*</span></label>
                            <select id="js-order-index" name="order_index" class="form-control"
                                    data-style="btn-white">
                                {{ $order_nums = \App\Menu::getOrderIndex(Session::get('locale'),'frontend_menu') + 1 }}
                                @for ($i = 1; $i <= $order_nums; $i++)
                                    @if($item->id == old('order_index'))
                                        <option selected value="{{ $i }}">{{ $i }}</option>
                                    @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="featured_img">Featured Image</label>
                            <input type="text" id="js-featured-img" name="featured_img" parsley-trigger="change"
                                   placeholder="" class="form-control" value="{{ old('featured_img') }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select id="js-status" name="status" class="form-control" data-style="btn-white">
                                <option value="publish">Publish</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Thêm</button>
                        </div>

                    </div> <!-- end card-box -->

                </div>
                <!-- end col -->

                <div class="col-lg-8 col-grid">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Help</h4>
                        <hr>
                    </div>
                </div>

            </div>
        </form>
        <!-- end row -->

    </div> <!-- container -->

@endsection

@section('javascript')
    <script>
        var resizefunc = [];
    </script>

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

    <script src="{{ asset("backend/plugins/jstree/jstree.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>

    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>
    <script src="{{ asset("backend/assets/pages/jquery.tree.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>

    @include('backend.shared.initjs')

    <script type="text/javascript">
        $(document).ready(function () {

            $('form').parsley();

            $('#js-name').slugify({target: '#js-slug'});

        });
    </script>
@endsection