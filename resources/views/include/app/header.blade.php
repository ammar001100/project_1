<header class="header">
			<div class="logo-wrapper">
				<a href="{{route('home')}}" class="logo">
					<img src="{{asset('asset/img/logo-dark.png')}}" alt="ادارة المبيعات" />
				</a>
				<a href="#" class="quick-links-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="روابط سريعة">
					<i class="icon-menu1"></i>
				</a>
			</div>
			<div class="">
			    <div class="hover-gallery" >				
					<figure class="effect-3" style='width:300px;height:70px;'>
						<img src="{{asset('asset/img/bg2.jpeg')}}" class="img-fluid" alt="Wafi Dashboard">
						<figcaption>
							<div>
								<h3 class='text-dark'>نظام ادارة المبيعات</h3>
								<p>عمار للبرمجيات</p>
							</div>
							<a href="{{route('home')}}"></a>
						</figcaption>			
					</figure>		
				</div>
            </div>
			<div class="header-items">
				<!-- Custom search start -->
				
				<!-- Custom search end -->

				<!-- Header actions start -->
				<ul class="header-actions">
					
					
					<li class="dropdown">
						<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<span class="user-name">{{ Auth::user()->name }}</span>
							<span class="avatar">
								@if(Auth::user()->type == 1)
								<img src="{{asset('asset/img/user_d.png')}}" alt="Admin Template" />
								<span class="status online"></span>
								@else
								<img src="{{asset('asset/img/user_d.png')}}" alt="Admin Template" />
								<span class="status online"></span>
								@endif
							</span>
						</a>   
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
							<div class="header-profile-actions" dir="rtl">
								<div class="header-user-profile">
									<div class="header-user">
									<img src="{{asset('asset/img/user_d.png')}}" alt="Admin Template" />
									</div>
									<h5>{{ Auth::user()->name }}</h5>
									<p>
                                      {{ Auth::user()->job }}
									</p>
								</div>
								<a href="{{route('profile')}}"><i class="icon-user1"></i>الصفحة الشخصية</a>
								<a href="{{route('account')}}"><i class="icon-settings1"></i>ضبط الحساب</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</div>
						</div>
					</li>
					<li>
						<a href="#" class="quick-settings-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="الضبط">
							<i class="icon-list"></i>
						</a>
					</li>
				</ul>						
				<!-- Header actions end -->
			</div>
		</header>