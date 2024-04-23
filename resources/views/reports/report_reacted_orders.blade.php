@extends('layouts.app')
@section('title')
التقارير
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item"> التقارير</li>
<li class="breadcrumb-item active"> تقرير الطلبات المردودة</li>
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

							<div class="table-container">
								<div class="t-header">Hiding Search Field</div>
								<div class="table-responsive">
									<table id="hideSearchExample" class="table table-bordered table-dark">
										<thead>
											<tr>
											  
											  <th>سعر الفاتورة</th>
											  <th>تاريخ الفاتورة</th>
											  <th>بواسطة</th>
											  <th>اسم العميل</th>
                                              <th>رقم الفاتورة</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($reports as $index=>$report)
											<tr>
											  
											  <td>{{ $report->total }}</td>
											  <td>{{ $report->order_date }}</td>
											  <td>{{ $report->user_name }}</td>
											  <td>{{ $report->client_name }}</td>
											  <td>#00{{ $report->order_num }}</td>
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
<script>
   $('.toast').toast('show')
</script>
<!-- Custom Data tables -->
<script src="{{asset('asset/vendor/datatables/custom/custom-datatables.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/custom/fixedHeader.js')}}"></script>

<!-- Download / CSV / Copy / Print -->

@endsection
