@extends('backend.layout')
@section('title', 'Sửa menu')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/nestable/jquery.nestable.css") }}"/>

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

                <h4 class="page-title">Sửa menu</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\MenuController@index') }}">Menus</a></li>
                    <li class="breadcrumb-item active">Sửa menu</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add"
              action="{{ action('Backend\MenuController@edit', array('id'=>$menu->id))  }}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $menu->id }}">
            <input type="hidden" id="news-categories" name="news-categories" value="{{ old('categories') }}">
            <input type="hidden" id="project-categories" name="project-categories" value="{{ old('categories') }}">
            <div class="row">
                <div class="col-lg-4 col-form">

                    <div class="card">
                        <div class="card-header text-left" id="headingOne">
                            <h6 class="m-0">
                                <a href="#collapseOne" class="collapsed text-dark"
                                   data-toggle="collapse" aria-expanded="false"
                                   aria-controls="collapseOne">
                                    Danh mục tin tức<i class="md md-keyboard-arrow-down float-right"></i>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="checkTree_news_category"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light js-btnAddNewsCate"
                                        style="bottom:10px;right:15px;"
                                        type="button">Thêm menu
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="card" style="margin-top:8px;">
                        <div class="card-header text-left" id="headingOne">
                            <h6 class="m-0">
                                <a href="#collapseProject" class="collapsed text-dark"
                                   data-toggle="collapse" aria-expanded="false"
                                   aria-controls="collapseOne">
                                    Danh mục dự án<i class="md md-keyboard-arrow-down float-right"></i>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseProject" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="checkTree_project_category"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light js-btnAddProjectCate"
                                        style="bottom:10px;right:15px;"
                                        type="button">Thêm menu
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="card" style="margin-top:8px;">
                        <div class="card-header text-left" id="headingOne">
                            <h6 class="m-0">
                                <a href="#collapseCustomeLink" class="collapsed text-dark"
                                   data-toggle="collapse" aria-expanded="false"
                                   aria-controls="collapseOne">
                                    Custome link<i class="md md-keyboard-arrow-down float-right"></i>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseCustomeLink" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" class="js-txt-link__text form-control" name="linkText" placeholder="link text" />
                                        <input type="text" class="js-txt-link__url form-control" name="linkUrl" placeholder="link url" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light js-btnAddCustomeLink"
                                        style="bottom:10px;right:15px;"
                                        type="button">Thêm menu
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-8 col-grid">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="m-t-0 header-title"><b>{{  $menu->slug  }}</b></h4>
                                {{--<p class="text-muted m-b-30 font-14">--}}
                                    {{--<button type="button" class="btn btn-primary js-btn-menuitem-save__all">Lưu</button>--}}
                                {{--</p>--}}

                                <div class="custom-dd-empty dd" id="nestable_list_3">
                                    @php($menu = \App\Menu::getThingsExtra($menu->id, $menu->locale, 0))
                                    <ol class="dd-list" id="js-menu">
                                        @foreach($menu as $menu_item)
                                            <li class="dd-item dd3-item" data-id="{{ $menu_item->id }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    {{ $menu_item->title }}
                                                    <span style="float: right;" class="js-menu-show-edit"
                                                          data-id="{{$menu_item->id}}">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           aria-expanded="false" style="color:#90979e;font-size: 11px;"
                                                           href="#collapse-{{$menu_item->id}}">
                                                            ( {{$menu_item->things_type}} )
                                                            <i class="md md-keyboard-arrow-down"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                                <div id="collapse-{{$menu_item->id}}" class="collapse"
                                                     aria-labelledby="headingOne"
                                                     data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="text" class="form-control js-menuitem"
                                                                       value="{{ $menu_item->title }}"/>
                                                                <input type="hidden" value="{{$menu_item->id}}"
                                                                       class="js-input__update-id">
                                                                <button class="btn btn-default waves-effect waves-light js-btn-menuitem__update"
                                                                        style="width:auto;height:auto; font-size: 9px;float: right;margin-top: 6px;"
                                                                        type="button">Cập nhật
                                                                </button>
                                                                <button class="btn btn-secondary waves-effect waves-light js-btn-menuitem__remove"
                                                                        style="width:auto;height:auto; font-size: 9px;float: right;
                                                                        margin-top: 6px; margin-right: 5px;"
                                                                        data-id="{{$menu_item->id}}"
                                                                        type="button">Xoá
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($menu_item->hasChild)
                                                    <ol class="dd-list">
                                                        @foreach($menu_item->children as $child)
                                                            <li class="dd-item dd3-item" data-id="{{ $child->id }}">
                                                                <div class="dd-handle dd3-handle"></div>
                                                                <div class="dd3-content">
                                                                    {{ $child->title }}
                                                                    <span style="float: right;">
                                                                        <a class="collapsed" data-toggle="collapse"
                                                                           aria-expanded="false"
                                                                           href="#collapse-{{$child->id}}">
                                                                            <i class="md md-keyboard-arrow-down"></i>
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                                <div id="collapse-{{$child->id}}" class="collapse"
                                                                     aria-labelledby="headingOne"
                                                                     data-parent="#accordion">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input class="form-control" type="text"
                                                                                       value="{{ $child->title }}"/>
                                                                                <button class="btn btn-default waves-effect waves-light js-menu-item__update"
                                                                                        style="width:auto;height:auto; font-size: 9px;float: right;margin-top: 6px;"
                                                                                        type="button">Cập nhật
                                                                                </button>
                                                                                <button class="btn btn-secondary waves-effect waves-light js-btn-menuitem__remove"
                                                                                        style="width:auto;height:auto; font-size: 9px;float: right;
                                                                                        margin-top: 6px; margin-right: 5px;"
                                                                                        data-id="{{$child->id}}"
                                                                                        type="button">Xoá
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    @include('backend.shared.flash-message')
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end card-box -->
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
    <script src="{{ asset("backend/plugins/jstree/jstree.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>
    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>

    <script src="{{ asset("backend/plugins/nestable/jquery.nestable.js") }}"></script>
    {{--    <script src="{{ asset("backend/assets/pages/nestable.js") }}"></script>--}}

    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>

    @include('backend.shared.initjs')

    <script>
        $(document).ready(function () {

            var updateOutput = function (e) {
                console.log('onchange');
                var list = e.length ? e : $(e.target), output = list.data('output');
                console.log(list.nestable('serialize'));
                $.ajax({
                    method: "POST",
                    url: "{{ action('Api\ThingController@saveNestedMenu') }}",
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                    },
                    data: {
                        list: list.nestable('serialize'),
                        id: $('#id').val(),
                        _token: '{{csrf_token()}}'
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    alert("Unable to save new list order: " + errorThrown);
                });
            };

            $('#nestable_list_3').nestable({
                group: 1,
                maxDepth: 7,
            }).on('change', updateOutput);

            $('.js-btn-menuitem-save__all').click(function () {
                $('#nestable_list_3').nestable({
                    group: 1,
                    maxDepth: 7,
                }).on('change', updateOutput);
            });

            // xoa menu-item
            $('.js-btn-menuitem__update').click(function () {

                let $id = $(this).siblings('input.js-input__update-id').val();
                //let $title = $(this).siblings('.js-menuitem').val();
                console.log($id);
                $.ajax({
                    url: '{{ action('Api\ThingController@deleteMenuItem') }}', type: 'POST', dataType: 'JSON',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                    },
                    data: {id: $id, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        console.log(data);
                    }
                });
            });

            $('#nestable_list_3').nestable();

            $('.js-btnAddNewsCate').click(function () {
                addMenu('#checkTree_news_category');
            });

            $('.js-btnAddProjectCate').click(function () {
                addMenu('#checkTree_project_category');
            });

            $('.js-btnAddCustomeLink').click(function () {
                addMenuLink('#checkTree_project_category');
            });

            var addMenuLink = function (tree_id) {
                var node = $(tree_id).jstree("get_selected");

                $.each(node, function (key, value) {
                    let item = "<li class='dd-item dd3-item' data-id='" + 0 + "'>"
                        + "<div class='dd-handle dd3-handle'></div>"
                        + "<div class='dd3-content'>"
                        + "<span style='float: right;'>"
                        + "<a class='collapsed' data-toggle='collapse' aria-expanded='false' href='#collapse-" + 0 + "'>"
                        + "<i class='md md-keyboard-arrow-down'></i>"
                        + "</a>"
                        + "</span>"
                        + $('.js-txt-link__text').val()
                        + "</div>"
                        + "<div id='collapse-" + 0 + "' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>"
                        + "<div class='card-body'>"
                        + "<div class='row'>"
                        + "<div class='col-12'>"
                        + "<input class='form-control' type='text' value='" + name + "' class='js-menuitem' />"
                        + "<input type='hidden' value='" + 0 + "' class='js-input__update-id'>"
                        + "<button class='btn btn-default waves-effect waves-light js-btn-menuitem__update'"
                        + " style='width:auto;height:auto; font-size: 9px;float: right;margin-top: 6px;'type='button'>Cập nhật</button>"
                        + "<button type='button' class='btn btn-secondary waves-effect waves-light js-btn-menuitem__remove' data-id='{{0}}' "
                        + "style='width:auto;height:auto; font-size: 9px;float: right; margin-top: 6px; margin-right: 5px;'>Xoá</button>"
                        + "</div>"
                        + "</div>"
                        + "</div>"
                        + "</li>";
                    $('#js-menu li:last').after(item);
                });
            };

            var addMenu = function (tree_id) {
                var node = $(tree_id).jstree("get_selected");

                $.each(node, function (key, value) {
                    let node = $(tree_id).jstree().get_node(value);
                    let name = node.text.trim();
                    let item = "<li class='dd-item dd3-item' data-id='" + value + "'>"
                        + "<div class='dd-handle dd3-handle'></div>"
                        + "<div class='dd3-content'>"
                        + "<span style='float: right;'>"
                        + "<a class='collapsed' data-toggle='collapse' aria-expanded='false' href='#collapse-" + value + "'>"
                        + "<i class='md md-keyboard-arrow-down'></i>"
                        + "</a>"
                        + "</span>"
                        + name
                        + "</div>"
                        + "<div id='collapse-" + value + "' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>"
                        + "<div class='card-body'>"
                        + "<div class='row'>"
                        + "<div class='col-12'>"
                        + "<input class='form-control' type='text' value='" + name + "' class='js-menuitem' />"
                        + "<input type='hidden' value='" + value + "' class='js-input__update-id'>"
                        + "<button class='btn btn-default waves-effect waves-light js-btn-menuitem__update'"
                        + " style='width:auto;height:auto; font-size: 9px;float: right;margin-top: 6px;'type='button'>Cập nhật</button>"
                        + "<button type='button' class='btn btn-secondary waves-effect waves-light js-btn-menuitem__remove' data-id='{{$menu_item->id}}'"
                        + "style='width:auto;height:auto; font-size: 9px;float: right; margin-top: 6px; margin-right: 5px;'>Xoá</button>"
                        + "</div>"
                        + "</div>"
                        + "</div>"
                        + "</li>";
                    $('#js-menu li:last').after(item);
                });
            };


            $('form').parsley();

            $('.js-menu-show-edit').click(function () {
                $('.js-input__update-id').val($(this).data("id"));
            });

            // doi ten menu-item
            $('.js-btn-menuitem__update').click(function () {

                let $id = $(this).siblings('input.js-input__update-id').val();
                let $title = $(this).siblings('.js-menuitem').val();

                console.log($id);
                console.log($title);

                $.ajax({
                    url: '{{ action('Api\ThingController@updateMenuItem') }}', type: 'POST', dataType: 'JSON',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                    },
                    data: {id: $id, title: $title, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        console.log(data);
                    }
                });
            });

            $('.js-btn-menuitem__remove').click(function () {
                $id = $(this).attr("data-id");
                console.log($id);
                $li = $("li").find("[data-id='" + $id + "']");
                console.log($li);
                $li.remove();

                $.ajax({
                    url: '{{ action('Api\ThingController@deleteMenuItem') }}', type: 'POST', dataType: 'JSON',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                    },
                    data: {id: $id, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        console.log(data);
                    }
                });
            });

            $.ajax({
                url: '{{ action('Api\NewsController@treeCategory') }}', type: 'GET', dataType: 'JSON',
                data: {},
                success: function (data) {
                    $('#checkTree_news_category').zenTree({
                        data: data,
                        target: '#news-categories'
                    });
                }
            });

            $.ajax({
                url: '{{ action('Api\ProjectController@treeCategory') }}', type: 'GET', dataType: 'JSON',
                data: {},
                success: function (data) {
                    $('#checkTree_project_category').zenTree({
                        data: data,
                        target: '#project-categories'
                    });
                }
            });

        });
    </script>
@endsection