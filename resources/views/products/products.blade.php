@extends('layouts.app')
@section('title')
المنتجات
@endsection
@section('css')
<!-- Data Tables -->
<link rel="stylesheet" href="{{asset('asset/vendor/datatables/dataTables.bs4.css')}}" />
<link rel="stylesheet" href="{{asset('asset/vendor/datatables/dataTables.bs4-custom.css')}}" />
<link href="{{asset('asset/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item active"> المنتجات</li>
@endsection
@section('content')
@include('include.error')          
<!-- Content wrapper start -->
<div class="content-wrapper">
<!-- Row start -->
<div class="row gutters text-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
        <div class="table-container">
            <div class="t-header">
            <button class="btn btn-secondary" type="button">
		    <span class="badge badge-pill badge-white">{{$products->count()}}</span>
            <span class="badge badge-pill badge-white">المنتجات</span>
			</button>
            </div>
            <div class="table-responsive">
                <table id="scrollVertical" class="table custom-table">
                    <thead>
                        <tr>
                        <th>الاجراء</th>
                        <th>القسم</th>
                          <th>الوحدة</th>
                          <th>العدد</th>
                          <th>تاريخ الانتهاء</th>
                          <th>تاريخ الانتاج</th>
                          <th>سعر الشراء</th>
                          <th>سعر البيع</th>
                          <th>اسم المنتج</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                          <td>
                          <a 
                          class="btn btn-primary btn-sm @if(auth()->user()->permissions->product_update == 0) disabled @endif" 
                          href="{{route('product.edit',$product->id)}}" type="submit">تعديل</a>
						  <a class="btn btn-danger btn-sm @if(auth()->user()->permissions->product_delete == 0) disabled @endif"  href="{{route('product.delete',$product->id)}}" type="submit">حذف</a>
                          </td>
                          <td>{{$product->section->name}}</td>
                          <td>{{$product->unit}}</td>
                          <td>{{$product->stock}}</td>
                          <td>{{$product->date_e}}</td>
                          <td>{{$product->date_p}}</td>
                          <td>{{number_format($product->price, 2, '.')}}</td>
                          <td>{{$product->price_sale}}</td>
                          <td>{{$product->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Data Tables -->
<script src="{{asset('asset/vendor/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>

<!-- Custom Data tables -->
<script src="{{asset('asset/vendor/datatables/custom/custom-datatables.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/custom/fixedHeader.js')}}"></script>
<!-- Download / CSV / Copy / Print -->
<script src="{{asset('asset/vendor/datatables/buttons.min.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/jszip.min.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/html5.min.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/buttons.print.min.js')}}"></script>
<script>
	$('.toast').toast('show')
</script>
<!-- Download / CSV / Copy / Print -->

@endsection
