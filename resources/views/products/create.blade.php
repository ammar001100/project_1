@extends('layouts.app')
@section('title')
    اضافة_منتج
@endsection
@section('css')
    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/datepicker/css/classic.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/datepicker/css/classic.date.css') }}" />
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"> المنتجات</li>
    <li class="breadcrumb-item active"> اضافة</li>
@endsection
@section('content')
    @include('include.error')
    @include('include.errors')
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="card-title text-center"> اضافة منتج </div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group text-center">
                                        <label for="fullName">الوحدة</label>
                                        <input type="text" name="unit" value="{{ old('unit') }}"
                                            class="form-control input-group-text" id="fullName" placeholder="الوحدة">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="eMail">سعر البيع</label>
                                        <input type="text" name="price_sale" value="{{ old('price_sale') }}"
                                            class="form-control input-group-text" id="eMail" placeholder="سعر البيع">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="phone">تاريخ الانتهاء</label>
                                        <div class="custom-date-input">
                                            <input type="text" name="date_e" value="{{ old('date_e') }}"
                                                class="form-control input-group-text" id="date-formatting"
                                                placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="website">الوصف</label>
                                        <textarea name="description" class="form-control input-group-text" id="message" name="description" placeholder="الوصف"
                                            maxlength="140" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group text-center">
                                        <label for="addRess">اسم المنتج</label>
                                        <input name="name" type="text" value="{{ old('name') }}"
                                            class="form-control input-group-text" id="addRess" placeholder="اسم المنتج">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="ciTy">سعر الشراء</label>
                                        <input name="price" type="text" value="{{ old('price') }}"
                                            class="form-control input-group-text" id="ciTy" placeholder="سعر الشراء">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="sate">تاريخ الانتاج</label>
                                        <div class="custom-date-input">
                                            <input type="text" name="date_p" value="{{ old('date_p') }}"
                                                class="form-control input-group-text date-formatting" id="date-formatting"
                                                placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="fullName">الكمية</label>
                                        <input type="text" name="stock" value="{{ old('stock') }}"
                                            class="form-control input-group-text" id="fullName" placeholder="الكمية">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select name="section_id" class="custom-select" id="inputGroupSelect02">
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">اختار القسم</label>
                                            </div>
                                        </div>
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
    <!-- Datepickers -->
    <script src="{{ asset('asset/vendor/datepicker/js/picker.js') }}"></script>
    <script src="{{ asset('asset/vendor/datepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('asset/vendor/datepicker/js/custom-picker.js') }}"></script>

    <!-- aleart toast -->
    <script>
        $('.toast').toast('show')
    </script>

    <!--    Input Masks JS -->
    <script src="{{ asset('asset/vendor/input-masks/cleave.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/input-masks/cleave-phone.js') }}"></script>
    <script src="{{ asset('asset/vendor/input-masks/cleave-custom.js') }}"></script>
@endsection
