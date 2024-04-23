@extends('layouts.app')
@section('title')
التقويم
@endsection
@section('css')
<!-- Calendar css -->
        <link rel="stylesheet" href="{{asset('asset/vendor/calendar/css/core/main.css')}}" />
		<link rel="stylesheet" href="{{asset('asset/vendor/calendar/css/daygrid/main.css')}}" />
		<link rel="stylesheet" href="{{asset('asset/vendor/calendar/css/list/main.css')}}" />
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item active"> التقويم</li>
@endsection
@section('content')
<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">


				


				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- row -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<div class="card m-0">
								<div class="card-body">
									<div id="calendarGoogle"></div>
								</div>
							</div>

						</div>
					</div>
					<!-- row end -->

				</div>
				<!-- Content wrapper end -->


			</div>
			<!-- *************
				************ Main container end *************
			************* -->
@endsection
@section('script')
<!-- Apex Charts -->
        <script src="{{asset('asset/vendor/apex/apexcharts.min.js')}}"></script>
		<!-- <script src="{{asset('asset/vendor/apex/helpdesk-dashboard/tickets.js')}}"></script> -->
		<script src="{{asset('asset/vendor/apex/helpdesk-dashboard/support-requests.js')}}"></script>
		<script src="{{asset('asset/vendor/apex/helpdesk-dashboard/complaints.js')}}"></script>
		<script src="{{asset('asset/vendor/apex/helpdesk-dashboard/traffic-analysis.js')}}"></script>
		<script src="{{asset('asset/vendor/apex/helpdesk-dashboard/cost-per-support.js')}}"></script>

		<!-- Rating JS -->
		<script src="{{asset('asset/vendor/rating/raty.js')}}"></script>
		<script src="{{asset('asset/vendor/rating/raty-custom.js')}}"></script>
		<!-- Fullcalendar -->
		<script src="{{asset('asset/vendor/calendar/js/core/main.min.js')}}"></script>
		<script src="{{asset('asset/vendor/calendar/js/daygrid/main.min.js')}}"></script>
		<script src="{{asset('asset/vendor/calendar/js/interaction/main.min.js')}}"></script>
		<script src="{{asset('asset/vendor/calendar/js/list/main.min.js')}}"></script>
		<script src="{{asset('asset/vendor/calendar/js/google-calendar/main.min.js')}}"></script>
		<script src="{{asset('asset/vendor/calendar/js/custom-google-calendar.js')}}"></script>
@endsection
