@extends('layouts.app')
@section('title')
    تعديل_منتج
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"> المنتجات</li>
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
                <form action="{{ route('product.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="card-title"> اضافة منتج </div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName"></label>
                                        <input type="text" name="unit" value="{{ $product->unit }}"
                                            class="form-control input-group-text" id="fullName" placeholder="الوحدة">
                                    </div>
                                    <div class="form-group">
                                        <label for="eMail"></label>
                                        <input type="text" name="price" value="{{ $product->price }}"
                                            class="form-control input-group-text" id="eMail" placeholder="سعر البيع">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"></label>
                                        <input type="text" name="date_e" value="{{ $product->date_e }}"
                                            class="form-control input-group-text" id="date-formatting"
                                            placeholder="تاريخ الانتهاء">
                                    </div>
                                    <div class="form-group">
                                        <label for="website"></label>
                                        <textarea name="description" class="form-control input-group-text" id="message" name="description" placeholder="الوصف"
                                            maxlength="140" rows="3">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="addRess"> </label>
                                        <input name="name" value="{{ $product->name }}" type="text"
                                            class="form-control input-group-text" id="addRess" placeholder="اسم المنتج">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciTy"></label>
                                        <input name="price_sale" value="{{ $product->price_sale }}" type="text"
                                            class="form-control input-group-text" id="ciTy" placeholder="سعر الشراء">
                                    </div>
                                    <div class="form-group">
                                        <label for="sTate"></label>
                                        <input name="date_p" value="{{ $product->date_p }}" type="data"
                                            class="form-control input-group-text" id="date-formatting"
                                            placeholder="تاريخ الانتاج">
                                    </div>
                                    <div class="form-group">
                                        <label for="fullName"></label>
                                        <input type="text" name="stock" value="{{ $product->stock }}"
                                            class="form-control input-group-text" id="fullName" placeholder="العدد">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select name="section_id" class="custom-select" id="inputGroupSelect02">
                                                <option value="{{ $product->section->id }}">{{ $product->section->name }}
                                                </option>
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
    <!-- Input Masks JS -->
    <script src="{{ asset('asset/vendor/input-masks/cleave.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/input-masks/cleave-phone.js') }}"></script>
    <script src="{{ asset('asset/vendor/input-masks/cleave-custom.js') }}"></script>
    <script>
        $('.toast').toast('show')
    </script>
@endsection
