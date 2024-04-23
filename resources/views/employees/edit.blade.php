@extends('layouts.app')
@section('title')
    تعديل_مستخدم
@endsection
@section('css')
    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/datepicker/css/classic.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/datepicker/css/classic.date.css') }}" />
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"> المستخدمين</li>
    <li class="breadcrumb-item active"> تعديل</li>
@endsection
@section('content')
    @include('include.error')
    @include('include.errors')
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ route('employee.update') }}" method="POST">
                    @csrf
                    <input name="id" type="hidden" value="{{ $employee->id }}">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="card-title text-center"> تعديل مستخدم </div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <div class="card-title">صلاحيات المنتجات</div>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Inline Checkbox  -->
                                                    <div class="form-check form-check-inline">
                                                        <input name="product_read" class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox1" value="1"
                                                            @if ($employee->permissions->product_read == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox1">عرض</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="product_create" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox2" value="1"
                                                            @if ($employee->permissions->product_create == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox2">اضف</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="product_update" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->product_update == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox3">تعديل</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="product_delete" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox4" value="1"
                                                            @if ($employee->permissions->product_delete == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox4">حذف</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="product_report" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox5" value="1"
                                                            @if ($employee->permissions->product_report == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox5">عرض
                                                            التقرير</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <div class="card-title">صلاحيات الاقسام</div>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Inline Checkbox  -->
                                                    <div class="form-check form-check-inline">
                                                        <input name="section_read" class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox1" value="1"
                                                            @if ($employee->permissions->section_read == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox1">عرض</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="section_create" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox2" value="1"
                                                            @if ($employee->permissions->section_create == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox2">اضف</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="section_update" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->section_update == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox3">تعديل</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="section_delete" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox4" value="1"
                                                            @if ($employee->permissions->section_delete == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox4">حذف</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <div class="card-title">صلاحيات الطلبات</div>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Inline Checkbox  -->
                                                    <div class="form-check form-check-inline">
                                                        <input name="order_read" class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox1" value="1"
                                                            @if ($employee->permissions->order_read == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox1">عرض</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="order_create" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox2" value="1"
                                                            @if ($employee->permissions->order_create == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox2">اضف</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="order_me" class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->order_me == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox3">عرض
                                                            طلباتي</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="order_day" class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->order_day == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox3">عرض طلبات
                                                            اليوم</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="order_delete" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox4" value="1"
                                                            @if ($employee->permissions->order_delete == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox4">حذف</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <div class="card-title">صلاحيات المستخدمين</div>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Inline Checkbox  -->
                                                    <div class="form-check form-check-inline">
                                                        <input name="employee_read" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox1" value="1"
                                                            @if ($employee->permissions->employee_read == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox1">عرض</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="employee_create" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox2" value="1"
                                                            @if ($employee->permissions->employee_create == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox2">اضف</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="employee_update" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->employee_update == 1) checked @endif>
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox3">تعديل</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="employee_delete" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox4" value="1"
                                                            @if ($employee->permissions->employee_delete == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox4">حذف</label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <div class="card-title">صلاحيات الخزنة</div>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Inline Checkbox  -->
                                                    <div class="form-check form-check-inline">
                                                        <input name="stock_read" class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox1" value="1"
                                                            @if ($employee->permissions->stock_read == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox1">عرض</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="stock_create" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox2" value="1"
                                                            @if ($employee->permissions->stock_create == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox2">اضف</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="stock_update" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->stock_update == 1) checked @endif>
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox3">تعديل</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="stock_delete" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox4" value="1"
                                                            @if ($employee->permissions->stock_delete == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox4">حذف</label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <div class="card-title">صلاحيات التقارير</div>
                                                </div>
                                                <div class="card-body">

                                                    <!-- Inline Checkbox  -->
                                                    <div class="form-check form-check-inline">
                                                        <input name="report_read" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox1" value="1"
                                                            @if ($employee->permissions->report_read == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox1">عرض</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="report_order" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox2" value="1"
                                                            @if ($employee->permissions->report_order == 1) checked @endif>
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox2">الطلبات</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="report_product" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox3" value="1"
                                                            @if ($employee->permissions->report_product == 1) checked @endif>
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox3">المنتجات</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input name="report_reacted" class="form-check-input"
                                                            type="checkbox" id="inlineCheckbox4" value="1"
                                                            @if ($employee->permissions->report_reacted == 1) checked @endif>
                                                        <label class="form-check-label" for="inlineCheckbox4">راجع</label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group text-center">
                                        <label for="addRess">الاسم</label>
                                        <input name="name" type="text" value="{{ $employee->name }}"
                                            class="form-control input-group-text" id="addRess" placeholder="الاسم">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="ciTy">رقم الهاتف</label>
                                        <input name="phone" type="text" value="{{ $employee->phone }}"
                                            class="form-control input-group-text" id="ciTy"
                                            placeholder="رقم الهاتف">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="fullName">الاميل</label>
                                        <input type="text" name="email" value="{{ $employee->email }}"
                                            class="form-control input-group-text" id="fullName" placeholder="الاميل">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select name="job" class="custom-select" id="inputGroupSelect02">

                                                <option value="{{ $employee->job }}">{{ $employee->job }}</option>
                                                <option value="مستخدم">مستخدم</option>
                                                <option value="مدير">مدير</option>
                                                <option value="مشرف">مشرف</option>
                                                <option value="موظف">موظف</option>
                                                <option value="عامل">عامل</option>

                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">اختار
                                                    الوظيفة</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="sate">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control input-group-text"
                                            id="sate" placeholder="كلمة المرور">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="fullName">اعادة كلمة المرور</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control input-group-text" id="fullName"
                                            placeholder="اعادة كلمة المرور">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->
@endsection
@section('script')
    <!-- Input Masks JS -->
    <script src="{{ asset('asset/vendor/input-masks/cleave.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/input-masks/cleave-phone.js') }}"></script>
    <script src="{{ asset('asset/vendor/input-masks/cleave-custom.js') }}"></script>
    <!-- Datepickers -->
    <script src="{{ asset('asset/vendor/datepicker/js/picker.js') }}"></script>
    <script src="{{ asset('asset/vendor/datepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('asset/vendor/datepicker/js/custom-picker.js') }}"></script>
    <script>
        $('.toast').toast('show')
    </script>
@endsection
