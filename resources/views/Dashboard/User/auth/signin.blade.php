@extends('Dashboard.layouts.master2')
@section('css')
<style>
	.loginform{display: none;}
</style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{trans('dashboard/login.welcome_back')}}</h2>
												<!-- Start Error & Success Message -->
												@if($errors->any())
													<div class="alert alert-danger">
														<ul>
															@foreach ($errors->all() as $error)
																<li>{{$error}}</li>
															@endforeach
														</ul>
													</div>
												@endif
												<!-- End Error & Success Message -->
												<!-- Start Login Type Selected -->
												<div class="form-group">
													<label for="loginTypeSelect">{{trans('dashboard/login.select_login_type')}}</label>
													<select class="form-control" id="loginTypeSelect">
														<option selected disabled>{{trans('dashboard/login.choose_from_position_list')}}</option>
														<option value="user">{{trans('dashboard/login.login_as_a_employee')}}</option>
														<option value="admin">{{trans('dashboard/login.login_as_a_admin')}}</option>
													</select>
												</div>
												<hr>
												<!-- End Login Type Selected -->
												<!-- Start Login User Form -->
												<div class="loginform" id="user">
													<h5 class="font-weight-semibold mb-4"></h5>
													<form method="POST" action="{{ route('user.login.post') }}">
														@csrf
														<!-- Start Email Field -->
														<div class="form-group">
															<label>{{trans('dashboard/login.email')}}</label>
															<input class="form-control" type="email" name="email" :value="old('email')" placeholder="{{trans('dashboard/login.email_placeholder')}}" required autofocus>
														</div>
														<!-- End Email Field -->
														<!-- Start Password Field -->
														<div class="form-group">
															<label>{{trans('dashboard/login.password')}}</label>
															<input class="form-control" placeholder="{{trans('dashboard/login.password_placeholder')}}" type="password" name="password">
														</div>
														<!-- End Password Field -->
														<button type="submit" class="btn btn-main-primary btn-block">{{trans('dashboard/login.sign_in')}}</button>
														<!-- Start Social Login -->
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block">{{trans('dashboard/login.sign_with')}} <i class="fab fa-facebook-f"></i></button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block">{{trans('dashboard/login.sign_with')}}<i class="fab fa-twitter"></i></button>
															</div>
														</div>
														<!-- End Social Login -->
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="{{ route('password.request') }}">{{trans('dashboard/login.forgot_password')}}</a></p>
														<p>{{trans('dashboard/login.dont_have_account')}} <a href="{{ url('/' . $page='signup') }}">{{trans('dashboard/login.create_new_account_link')}}</a></p>
													</div>
												</div>
												<!-- End Login User Form -->
												<!-- Start Login Admin Form -->
												<div class="loginform" id="admin">
													<h5 class="font-weight-semibold mb-4"></h5>
													<!-- Start form -->
													<form method="POST" action="{{ route('admin.login.post') }}">
														@csrf
														<!-- Start Email Field -->
														<div class="form-group">
															<label>{{trans('dashboard/login.email')}}</label>
															<input class="form-control" type="email" name="email" :value="old('email')" placeholder="{{trans('dashboard/login.email_placeholder')}}" required autofocus>
														</div>
														<!-- End Email Field -->
														<!-- Start Password Field -->
														<div class="form-group">
															<label>{{trans('dashboard/login.password')}}</label>
															<input class="form-control" placeholder="{{trans('dashboard/login.password_placeholder')}}" type="password" name="password">
														</div>
														<!-- End Password Field -->
														<button type="submit" class="btn btn-main-primary btn-block">{{trans('dashboard/login.sign_in')}}</button>
														<!-- Start Social Login -->
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block">{{trans('dashboard/login.sign_with')}} <i class="fab fa-facebook-f"></i></button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block">{{trans('dashboard/login.sign_with')}}<i class="fab fa-twitter"></i></button>
															</div>
														</div>
														<!-- End Social Login -->
													</form>
													<!-- End form -->
													<!-- Start main-signin-footer -->
													<div class="main-signin-footer mt-5">
														<p><a href="{{ route('password.request') }}">{{trans('dashboard/login.forgot_password')}}</a></p>
														<p>{{trans('dashboard/login.dont_have_account')}} <a href="{{ url('/' . $page='signup') }}">{{trans('dashboard/login.create_new_account_link')}}</a></p>
													</div>
													<!-- End main-signin-footer -->
												</div>
												<!-- End Login Admin Form -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
<script>
	$('#loginTypeSelect').change(function(){
		var myID = $(this).val();
		$('.loginform').each(function(){
			myID === $(this).attr('id') ? $(this).show() : $(this).hide();
		});
	});
</script>
@endsection