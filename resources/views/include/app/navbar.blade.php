<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" dir="rtl" id="WafiAdminNavbar">
                <ul class="navbar-nav" >
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dashboardsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-devices_other nav-icon"></i>
								<h5 class='text-danger'>الرئيسية</h5>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dashboardsDropdown">
								<li>
									<a class="dropdown-item text-center" href="{{route('home')}}">الرئيسية</a>
								</li>
								<li>
									<a class="dropdown-item text-center" href="{{route('calendar')}}">التقويم</a>
								</li>
								
								
							</ul>
						</li>
						@if(auth()->user()->permissions->section_read == 1)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-layers2 nav-icon"></i>
								<h5 class='text-danger'>الاقسام</h5> 
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							@if(auth()->user()->permissions->section_read == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('section')}}">عرض الاقسام</a>
								</li>
							@endif
							@if(auth()->user()->permissions->section_create == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('section.add')}}">اضافة قسم</a>
								</li>
							@endif
							</ul>
						</li>
						@endif
						@if(auth()->user()->permissions->product_read == 1)
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-package nav-icon"></i>
								<h5 class='text-danger'>المنتجات</h5>
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							@if(auth()->user()->permissions->product_read == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('product')}}">عرض المنتجات</a>
								</li>
							@endif
							@if(auth()->user()->permissions->product_create == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('product.add')}}">اضافة منتج</a>
								</li>
							@endif
							@if(auth()->user()->permissions->product_report == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('product.report')}}">تقرير</a>
								</li>
							@endif
							</ul>
						</li>
                        @endif
						@if(auth()->user()->permissions->order_read == 1)
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-edit1 nav-icon"></i>
								<h5 class='text-danger'>الطلبات</h5>
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							@if(auth()->user()->permissions->order_create == 1)
							    <li>
									<a class="dropdown-item text-center" href="{{route('temp.add')}}">اضافة طلب</a>
								</li>
							@endif
							@if(auth()->user()->permissions->order_read == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('order')}}">جميع الطلبات</a>
								</li>
							@endif
							@if(auth()->user()->permissions->order_me == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('order.my',auth()->user()->id)}}">طلبات بواستطي</a>
								</li>
							@endif
							@if(auth()->user()->permissions->order_day == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('order.day_sale')}}">طلبات اليوم</a>
								</li>
							@endif
							</ul>
						</li>
                        @endif
						@if(auth()->user()->permissions->report_read == 1)
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-pie-chart1 nav-icon"></i>
								<h5 class='text-danger'>التقارير</h5>
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							@if(auth()->user()->permissions->report_order == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('report.orders')}}">تقرير الطلبات</a>
								</li>
							@endif
							@if(auth()->user()->permissions->report_product == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('report.reacted.order')}}">تقرير الطلبات المردودة</a>
								</li>
							@endif
							@if(auth()->user()->permissions->report_order == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('report.employee')}}">تقرير طلبات المستخدمين</a>
								</li>
							@endif
							@if(auth()->user()->permissions->report_reacted == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('report.products')}}">تقرير المنتجات</a>
								</li>
							@endif	
							</ul>
						</li>
						@endif
						@if(auth()->user()->permissions->stock_read == 1)
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-pie-chart1 nav-icon"></i>
								<h5 class='text-danger'>الخزنة</h5>
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item text-center" href="{{route('stock')}}">تفاصيل الخزنة</a>
								</li>
								
							</ul>
						</li>
						@endif
						@if(auth()->user()->permissions->employee_read == 1)
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
								<h5 class='text-danger'>المستخدمين</h5>
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							@if(auth()->user()->permissions->employee_read == 1)
							    <li>
									<a class="dropdown-item text-center" href="{{route('employee')}}">عرض المستخدمين</a>
								</li>
							@endif
							@if(auth()->user()->permissions->employee_create == 1)
								<li>
									<a class="dropdown-item text-center" href="{{route('employee.add')}}">اضافة المستخدمين</a>
								</li>
							@endif
							</ul>
						</li>
                        @endif
                        </ul>
				</div>
			</nav>