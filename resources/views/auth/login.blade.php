<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{asset('asset/img/fav.png')}}" />

		<!-- Title -->
		<title>تسجيل دخول</title>
		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="{{asset('asset/css/main.css')}}" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
		
        <form method="POST" action="{{ route('login') }}">
             @csrf
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box text-right">
								<a href="#" class="login-logo" dir="rtl">
									<img class="" src="{{asset('asset/img/logo-dark.png')}}" alt="Wafi Admin Dashboard" />
								</a>
								
								<h5>مرحبا بعودتك<br />الرجاء تسجيل الدخول</h5>
								<div class="form-group">
									<input type="text" name="email" class="form-control text-center @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email Address" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control text-center @error('password') is-invalid @enderror" placeholder="Password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="actions mb-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember_pwd">
										<label class="custom-control-label" for="remember_pwd">تزكرني</label>
									</div>
									<button type="submit" class="btn btn-primary">دخول</button>
								</div>
								<div class="forgot-pwd">
									<a class="link" href="forgot-pwd.html">نسيت كلمة المرور؟</a>
								</div>
								<hr>
								
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>
</html>