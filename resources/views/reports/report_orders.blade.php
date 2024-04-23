@extends('layouts.app')
@section('title')
    التقارير
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('asset/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item active"> التقارير</li>
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
                    <div class="card">
                        <div class="card-body text-right">

                            <h5> مجموع قيمة الفواتير : {{ $totals[0] }}</h5>
                            <h5> مجموع الارباح : {{ $wons[0] }} </h5>
                            <h5> عدد الطلبات : {{ $counts[0] }} </h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <form action="{{ route('report.orders') }}" method="get">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label></label>
                                            <button type="submit" class="form-control btn btn-success"
                                                id="date-formatting2">بحث</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group text-center">
                                            <label>الى</label>
                                            <input type="text" name="date_to"
                                                value="@if (isset($request)) {{ $request['date_to'] }} @endif"
                                                class="form-control input-group-text date-formatting"
                                                placeholder="YYYY-MM-DD" id="date-formatting" />
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group text-center">
                                            <label>من</label>
                                            <input type="text" name="date_from"
                                                value="@if (isset($request)) {{ $request['date_from'] }} @endif"
                                                class="form-control input-group-text date-formatting"
                                                placeholder="YYYY-MM-DD" id="date-formatting" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Row end -->
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="table-container text-center">
                        <div class="t-header">

                        </div>
                        <div class="table-responsive">
                            <table id="scrollVertical" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>ربح الفاتورة</th>
                                        <th> التخفيض</th>
                                        <th>سعر الفاتورة</th>
                                        <th>تاريخ الفاتورة</th>
                                        <th>بواسطة</th>
                                        <th>اسم العميل</th>
                                        <th>رقم الفاتورة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $index => $report)
                                        <tr>
                                            <td>{{ $report->won }}</td>
                                            <td>{{ $report->axing }}</td>
                                            <td>{{ $report->total }}</td>
                                            <td>{{ $report->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $report->user_name }}</td>
                                            <td>{{ $report->client_name }}</td>
                                            <td>#00{{ $report->order_num }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $reports->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
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
            <script src="{{ asset('asset/vendor/datatables/dataTables.min.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

            <!-- Custom Data tables -->
            <script src="{{ asset('asset/vendor/datatables/custom/custom-datatables.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/custom/fixedHeader.js') }}"></script>
            <!-- Download / CSV / Copy / Print -->
            <script src="{{ asset('asset/vendor/datatables/buttons.min.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/jszip.min.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/pdfmake.min.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/vfs_fonts.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/html5.min.js') }}"></script>
            <script src="{{ asset('asset/vendor/datatables/buttons.print.min.js') }}"></script>
            <script>
                $('.toast').toast('show')
            </script>
            <!-- Download / CSV / Copy / Print -->
        @endsection
