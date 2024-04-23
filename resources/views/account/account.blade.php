@extends('layouts.app')
@section('title')
My Profile
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item active"> الحساب</li>
@endsection
@section('content')
@include('include.error')
@include('include.errors')
<!-- Content wrapper start -->
<div class="content-wrapper">

<!-- Row start -->
<div class="row gutters text-center" dir="rtl">
    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-header">
                                <div class="card-title">تحديث الملف الشخصي</div>
                            </div>
                            <div class="card-body">
                                <div class="row gutters">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="{{asset('asset/img/user6.png')}}" alt="Wafi Admin" />
                                        </div>
                                        <h5 class="user-name">{{ Auth::user()->name }}</h5>
                                        <h6 class="user-email">{{ Auth::user()->email }}</h6>
                                    </div>
                                    <div class="setting-links">
                                        <a href="chat.html">
                                            <i class="icon-chat"></i>
                                            Messages
                                        </a>
                                        <a href="tasks.html">
                                            <i class="icon-date_range"></i>
                                            Tasks
                                        </a>
                                        <a href="documents.html">
                                            <i class="icon-file-text"></i>
                                            Documents
                                        </a>
                                        <a href="faq.html">
                                            <i class="icon-info"></i>
                                            FAQ's
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <form  action="{{route('account.update')}}" method="POST">
                    <input name="id" type="hidden" value="{{$employee->id}}">
		                @csrf   
					
						<div class="form-group text-center">
							<label for="addRess">الاسم</label>
							<input name="name" type="text" value="{{$employee->name}}" class="form-control input-group-text" id="addRess" placeholder="الاسم">
						</div>
						<div class="form-group text-center">
							<label for="ciTy">رقم الهاتف</label>
							<input name="phone" type="text" value="{{$employee->phone}}" class="form-control input-group-text" id="ciTy" placeholder="رقم الهاتف">
						</div>
						<div class="form-group text-center">
							<label for="fullName">الاميل</label>
							<input type="text" name="email" value="{{$employee->email}}" class="form-control input-group-text" id="fullName" placeholder="الاميل">
						</div>
						<div class="form-group">
							<div class="input-group">
								<select name="job" class="custom-select" id="inputGroupSelect02">
									
								    <option value="{{$employee->job}}">{{$employee->job}}</option>				
									
									
								</select>
								<div class="input-group-append">
									
								</div>
							</div>
					    </div>
						<div class="form-group text-center">
							<label for="sate">كلمة المرور</label>
							<input type="password" name="password"  class="form-control input-group-text" id="sate" placeholder="كلمة المرور">
						</div>
						<div class="form-group text-center">
							<label for="fullName">اعادة كلمة المرور</label>
							<input type="password" name="password_confirmation"  class="form-control input-group-text" id="fullName" placeholder="اعادة كلمة المرور">
						</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="submit" class="btn btn-success">حفظ</button>
						</div>
					</div>

                   </form>
	

</div>
<!-- Content wrapper end -->


</div>
<!-- *************
************ Main container end *************
************* -->

@endsection
@section('script')
<!-- Input Masks JS -->
        <script src="{{asset('asset/vendor/input-masks/cleave.min.js')}}"></script>
		<script src="{{asset('asset/vendor/input-masks/cleave-phone.js')}}"></script>
		<script src="{{asset('asset/vendor/input-masks/cleave-custom.js')}}"></script>
		<!-- Datepickers -->
		<script src="{{asset('asset/vendor/datepicker/js/picker.js')}}"></script>
		<script src="{{asset('asset/vendor/datepicker/js/picker.date.js')}}"></script>
		<script src="{{asset('asset/vendor/datepicker/js/custom-picker.js')}}"></script>
		<script>
	     $('.toast').toast('show') 
        </script>
	     
@endsection
