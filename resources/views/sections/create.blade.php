@extends('layouts.app')
@section('title')
اضافة_قسم
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item">الاقسام</li>
<li class="breadcrumb-item active"> اضافة</li>
@endsection
@section('content')
@include('include.error')
@include('include.errors')
				<!-- Content wrapper start -->
				<div class="content-wrapper">


					<div class="row justify-content-center gutters" dir="rtl">
						<div class="col-xl-7 col-lg-7 col-md-8 col-sm-10" >
							<form  action="{{route('section.store')}}" method="POST">
								@csrf
								<div class="card m-0">
									<div class="card-header">
										<div class="card-title">ادخل بيانات القسم</div>
										<div class="card-sub-title">يجب ادخال البيانات بطريقة منظمة</div>
									</div>
									<div class="card-body">
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<input type="text" class="form-control" id="name" name="name" placeholder="اسم القسم" required="">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												
											</div>
										</div>
										
										<div class="row gutters">
											
											</div>
											
										</div>
										
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<textarea class="form-control" id="message" name="description" placeholder="الوصف" maxlength="140" rows="3"></textarea>
													<div class="form-text text-muted"><p id="characterLeft" class="help-block ">140 عدد الحروف</p></div>                    
												</div>
											</div>
										</div>
										
										<button type="submit"  class="btn btn-primary float-right">حفظ</button>

									</div>
								</div>
							</form>
						</div>
					</div>


				</div>
				<!-- Content wrapper end -->
@endsection
@section('script')

@endsection
