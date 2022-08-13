@extends('backend.layout')
@section('title', 'Thêm sản phẩm')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/select2/css/select2.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}"/>
    <link rel="stylesheet"
          href="{{ asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>

    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/custom.css") }}"/>

    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')

    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">

                <h4 class="page-title">Thêm Sản phẩm</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\ProductController@index') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Thêm</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add"
              action="{{ action('Backend\ProductController@add') }}">
             {{ csrf_field() }}
            <input type="hidden" id="categories" name="categories" value="{{ old('categories') }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="name">Tên sản phẩm</lable>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       parsley-trigger="change" required placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="slug">Chuỗi đường dẫn tĩnh</lable>
                                <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                                       parsley-trigger="change" required placeholder=""
                                       class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="price">Giá sản phẩm</lable>
                                <input type="text" id="price" name="price" value="{{ old('price') }}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="number">Số lượng sản phẩm</lable>
                                <input type="text" id="number" name="number" value="{{ old('number') }}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="name">Giảm giá</lable>
                                <input type="text" id="discount" name="discount" value="{{ old('discount') }}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="slug">Trọng lượng</lable>
                                <input type="text" id="weight" name="weight" value="0"
                                       parsley-trigger="change"  placeholder=""
                                       class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="transporters">Nhà vận chuyển</lable>
                                <input type="text" id="transporters" name="transporters" value="{{ old('transporters') }}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="transport_code">Mã vận đơn</lable>
                                <input type="text" id="transport_code" name="transport_code" value="{{ old('transport_code') }}"
                                       parsley-trigger="change" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="status">trạng thái</lable>
                                <select name="status" id="status" class="selectpicker form-control">
                                               <option value="1">1. Chưa đặt</option>
                                               <option value="2">2. Đã thanh toán</option>
                                               <option value="3">3. Shop đã phát hàng</option>
                                               <option value="4">4. Kho TQ đã kí nhận</option>
                                               <option value="5">5. Đang chuyển HN</option>
                                               <option value="6">6. Hà nội đã nhận</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <lable for="dllCustomer">tên khách hàng</lable>
                                <select name="dllCustomer" id="dllCustomer" class="selectpicker form-control">
                                    @foreach( \App\Product::listCustomer() as $item)
                                        <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <lable for="link">link sản phẩm</lable>
                                <input type="text" id="link" name="link" value="{{ old('link') }}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable >tỉ giá</lable>
                                <input type="text" id="rate" name = "rate" value="3.5"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="ship">Giá ship hà nội</lable>
                                <input type="text" id="ship" name="ship" value="{{old('ship')}}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="ship">Giá ship trung quốc</lable>
                                <input type="text" id="shipCN" name="shipCN" value="{{old('shipCN')}}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-10">
                                    <label>Tóm tắt</label>
                                    <textarea id="content" name="content" class="form-control" rows="3"
                                              placeholder="Tóm tắt">{{ old('content') }}</textarea>
                            </div>
                            <div class="col-lg-2" style="padding-top: 25px">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </form>

    </div> <!-- container -->

    <div id="modal-select-img" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="full-width-modalLabel">Chọn ảnh</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <iframe style="width:100%;" height="500px" frameborder="0"
                            src="/backend/plugins/filemanager/dialog.php?type=1&field_id=featured_img&relative_url=1&multiple=0">
                    </iframe>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
    @include('backend.shared.initjs')

    <script type="text/javascript">
        $(document).ready(function () {
            $("#content").richer('#content');
            $('#name').slugify({target: '#slug'});

            
        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/{{ env('UPLOAD_FOLDER') }}/');
        }
    </script>
     <script>
         $(document).ready(function(){
             @if(Session::has('message'))
             alert('{{ Session::get('message') }}');
             @endif
         });
</script>
@endsection
