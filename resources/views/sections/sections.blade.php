@extends('layouts.app')
@section('title')
الاقسام
@endsection
@section('css')
<!-- Data Tables -->
<link rel="stylesheet" href="{{asset('asset/vendor/datatables/dataTables.bs4.css')}}" />
<link rel="stylesheet" href="{{asset('asset/vendor/datatables/dataTables.bs4-custom.css')}}" />
<link href="{{asset('asset/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item active"> الاقسام</li>
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
		                         <span class="badge badge-pill badge-white">{{$sections->count()}}</span>
                                 <span class="badge badge-pill badge-white">الاقسام</span>
			                     </button>
								</div>
								<div class="table-responsive">
									<table id="scrollVertical" class="table custom-table">
										<thead>
											<tr>
											  <th>الاجراء</th>
											  <th>الوصف</th>
											  <th>اسم القسم</th>
											</tr>
										</thead>
										<tbody>
											@foreach($sections as $section)
											<tr>
											  <td>
											  <a class="btn btn-primary btn-sm" href="{{route('section.edit',$section->id)}}" type="submit">تعديل</a>
											  <a class="btn btn-danger btn-sm"  href="{{route('section.delete',$section->id)}}" type="submit">حذف</a>
											  </td>
											  <td>{{$section->description}}</td>
											  <td>{{$section->name}}</td>
											</tr>
											@endforeach
										</tbody>
						    	</table>
								{{ $sections->links('vendor.pagination.bootstrap-5') }}
								</div>
							</div>
				    	</div> 
					</div>
	        <!-- end row -->
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
