@extends('backend.layout')
@section('title', 'Cập nhật sản phẩm')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/select2/css/select2.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css") }}"/>
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

                <h4 class="page-title">Cập nhật sản phẩm</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\ProductController@index') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>

            </div>
        </div>

        <form method="post" class="form-add"
              action="{{ action('Backend\ProductController@edit', array('id'=>$thing->id)) }}">
             {{ csrf_field() }}
            <input type="hidden" id="id" name="id" value="{{ $thing->id }}">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="name">Tên sản phẩm</lable>
                                <input type="text" id="name" name="name" value="{{ $thing->name }}"
                                       parsley-trigger="change" required placeholder="Tiêu đề" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable>Chuỗi đường dẫn tĩnh</lable>
                                <input type="text" id="slug" name="slug" value="{{ $thing->slug }}"
                                       parsley-trigger="change" required placeholder="Chuỗi đường dẫn tĩnh"
                                       class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable>Giá sản phẩm</lable>
                                <input type="text" id="price" name="price" value="{{ $thing->price }}"
                                       parsley-trigger="change" required placeholder="Giá sản phẩm" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable>Số lượng</lable>
                                <input type="text" id="number" name="number" value="{{ $thing->number }}"
                                       parsley-trigger="change" required placeholder="Số lượng sản phẩm" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="name">Giảm giá</lable>
                                <input type="text" id="discount" name="discount" value="{{ $thing->discount }}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable for="slug">Trọng lượng</lable>
                                <input type="text" id="weight" name="weight" value="{{ $thing->weight }}"
                                       parsley-trigger="change"  placeholder=""
                                       class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable>Nhà vận chuyển</lable>
                                <input type="text" id="transporters" name="transporters" value="{{ $thing->transporters }}"
                                       parsley-trigger="change" required placeholder="Nhà vận chuyển" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable>Mã vận chuyển</lable>
                                <input type="text" id="transport_code" name="transport_code" value="{{ $thing->transport_code }}"
                                       parsley-trigger="change" required placeholder="Mã vận chuyển" class="form-control">
                            </div>

                        </div>
                    </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable>Trạng thái</lable>
                                           <select name="status" id="status" class="selectpicker form-control">
                                               <option>{{$thing->status}}</option>
                                               <option>1. Chưa đặt</option>
                                               <option>2. Đã thanh toán</option>
                                               <option>3. Shop đã phát hàng</option>
                                               <option>4. Kho TQ đã kí nhận</option>
                                               <option>5. Đang chuyển HN</option>
                                               <option>6. Hà nội đã nhận</option>
                                               <option>7. Đã hủy</option>
                                           </select>
                            </div>
                            <div class="col-lg-3">
                                <lable>Khách hàng</lable>
                                <input type="hidden" value="{{$customer_id = $thing->customer_id}}">
                                <select name="dllCustomer" id="dllCustomer" class="selectpicker form-control">
                                    <option value="{{$customer_id }}">{{\App\Product::getCustomerByID($customer_id)}}</option>
                                    @foreach( \App\Product::listCustomer() as $item)
                                         <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <lable>Link</lable>
                                <input type="text" id="link" name="link" value="{{ $thing->link }}"
                                       parsley-trigger="change" required placeholder="link" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <lable>tỉ giá</lable>
                                <input type="text" id="rate" name = "rate" value="{{$thing->rate}}"
                                       parsley-trigger="change" required placeholder="tỉ giá" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <lable for="name">Giá ship</lable>
                                <input type="text" id="ship" name="ship" value="{{$thing->ship}}"
                                       parsley-trigger="change"  placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                    <div class="row">
                        <div class="col-lg-10">
                                <label>Tóm tắt</label>
                                <textarea id="content" name="content" class="form-control" rows="3"
                                          placeholder="Tóm tắt">{{ $thing->content }}</textarea>
                        </div>
                        <div class="col-lg-2" style="padding-top: 25px">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Sửa
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


            reloadImages('featured_img', '');
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
