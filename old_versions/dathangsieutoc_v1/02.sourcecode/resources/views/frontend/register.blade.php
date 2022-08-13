@extends('frontend.layout')
@section('title', 'Trang chủ')
@section('body-name', 'register')
@section('css')
<link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
<link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
<script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')
		<div class="wrapper-page">
			<div class=" card-box">
				<div class="panel-heading">
					<h4 class="text-center">Đăng kí <strong class="text-custom"></strong> </h4>
				</div>
				<div class="p-20">
					<form id="register_form" class="form-horizontal m-t-20">
						<div class="form-group ">
							<div class="col-12">
								<input class="form-control" type="text" required="" placeholder="Họ tên" name="name">
							</div>
						</div>
						<div class="form-group ">
							<div class="col-12">
								<input class="form-control" type="email" required="" placeholder="Email" name="email">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-12">
								<input class="form-control" type="text" required="" placeholder="Tên đăng nhập" name="username">
							</div>
						</div>

						<div class="form-group">
							<div class="col-12">
								<input class="form-control" type="password" required="" placeholder="Mật khẩu" name="password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<input class="form-control" type="password" required="" placeholder="Xác nhận mật khẩu" name="password_confirmation">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<div class="checkbox checkbox-primary">
									<input id="checkbox-signup" type="checkbox" checked="checked" required>
									<label for="checkbox-signup">Tôi đồng ý với <a href="#">Điều khoản</a></label>
								</div>
							</div>
						</div>
					</form>
					<div class="form-group text-center m-t-40">
						<div class="col-12">
							<input class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" id="submit_register" value="Đăng kí">
						</div>
					</div>
					<div class="alert alert-danger print-error-msg form-group text-center" style="display:none">
						<div class="col-12">
							<ul></ul>
						</div>
					</div>
                    <div class="row">
                        <div class="col-12 text-center pt-3">
                            <p>
                                Đã có tài khoản?<a href="page-login.html" class="text-primary m-l-5"><b>Đăng nhập</b></a>
                            </p>
                        </div>
                    </div>
				</div>
			</div>
			
        </div>
@endsection
@section('javascript')
<script>
	$(document).ready(function() {
		$('#submit_register').click(function() {
			$.ajax({
				url: '{{ action('Api\UserController@register') }}',
				headers: {
					'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content');
				},
				type: "POST",
				data: $('#register_form').serialize(),
				success: function (data) {
					if($.isEmptyObject(data.error)){ console.log(data);
						window.location.href = data.redirect;
					} else {
						printErrorMsg(data.error);
					}
				}
			});
		});
	});
	function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
</script>
@endsection