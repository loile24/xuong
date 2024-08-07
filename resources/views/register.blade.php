@extends('layouts.layoutDangNhap')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
              
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url({{asset('theme/client/assets/images/backgrounds/login-bg.jpg')}}">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							   
							    <li class="nav-item">
							        <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>
							<div class="tab-content">
							
							    <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
									<form action="{{ route('register') }}" method="POST">
										@csrf
										<div class="form-group">
											<label for="register-ho-ten-2">Full Name *</label>
											<input type="text" class="form-control" id="register-ho-ten-2" name="ho_ten" required>
										</div><!-- End .form-group -->
		
										<div class="form-group">
											<label for="register-email-2">Your email address *</label>
											<input type="email" class="form-control" id="register-email-2" name="email" required>
										</div><!-- End .form-group -->
		
										<div class="form-group">
											<label for="123">Password *</label>
											<input type="password" class="form-control" id="123" name="mat_khau" required>
										</div><!-- End .form-group -->
										
										<div class="form-group">
											<label for="">Phone Number *</label>
											<input type="number" class="form-control" name="so_dien_thoai" required>
										</div><!-- End .form-group -->

										<div class="form-group">
											<label for="">Adress *</label>
											<input type="text" class="form-control" name="dia_chi" required>
										</div><!-- End .form-group -->

										<div class="form-group">
											<label for="register-ngay-sinh-2">Date of Birth *</label>
											<input type="date" class="form-control" id="register-ngay-sinh-2" name="ngay_sinh" required>
										</div><!-- End .form-group -->
		
										<div class="form-group">
											<label for="register-gioi-tinh-2">Gender *</label>
											<select class="form-control" id="register-gioi-tinh-2" name="gioi_tinh" required>
												<option value="0">Nam</option>
												<option value="1">Nữ</option>
											</select>
										</div><!-- End .form-group -->
										{{-- Thêm thành công --}}
										@if (session('success'))
										<div class="text-success">
											{{ session('success') }}
										</div>
									@endif
										<div class="form-footer">
											<button type="submit" class="btn btn-outline-primary-2">
												<span>SIGN UP</span>
												<i class="icon-long-arrow-right"></i>
											</button>
		
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy-2" required>
												<label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
											</div><!-- End .custom-checkbox -->
										</div><!-- End .form-footer -->
									</form>
							    	<div class="form-choice">
								    	<p class="text-center">Đã có tài khoản? <a href="{{url('login')}}">Đăng nhập</a></p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login  btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->

@endsection