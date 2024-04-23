@extends('layouts.app')
@section('title')
التقارير
@endsection
@section('css')
<!-- Data Tables -->
<link rel="stylesheet" href="{{asset('asset/vendor/datatables/dataTables.bs4.css')}}" />
<link rel="stylesheet" href="{{asset('asset/vendor/datatables/dataTables.bs4-custom.css')}}" />
<link href="{{asset('asset/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item"> التقارير</li>
<li class="breadcrumb-item active"> طلبات المستخدمين</li>
@endsection
@section('content')
@include('include.errors')
@include('include.error')
<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">
            
				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

						<div class="table-container text-center">
									<div class="t-header">
									<button class="btn btn-secondary" type="button">
									<span class="badge badge-pill badge-white">{{$employees->count()}}</span>
									<span class="badge badge-pill badge-white">المستخدمين</span>
									</button>
									</div>
									<div class="table-responsive">
										<table id="scrollVertical" class="table custom-table">
										<thead>
											<tr>
											  
											  <th>الاجراء</th>
											  <th>عدد الطلبات</th>
											  <th>اسم المستخدم</th>
                                              <th>#</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($employees as $index=>$employee)
											<tr>
											  <td>
											  <a class="btn btn-primary btn-sm" href="{{route('report.employee.order',$employee->id)}}">عرض</a>
											  </td>
											  <td>{{ $employee->orders->count() }}</td>
											  <td>{{ $employee->name }}</td>
											  <td>{{ $index + 1 }}</td>
											</tr>
										@endforeach
										</tbody>
						    	</table>
								</div>
							</div>
                          </div>
					<!-- Row end --> 

				</div>
				<!-- Content wrapper end -->


			</div>
			<!-- *************
				************ Main container end *************
			************* -->
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

