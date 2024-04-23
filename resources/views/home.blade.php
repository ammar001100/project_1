@extends('layouts.app')
@section('title')
    الرئيسية
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">الرئيسية</li>
@endsection
@section('content')
@section('css')
    <!-- Chartist css -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/chartist/css/chartist.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/chartist/css/chartist-custom.css') }}" />
@endsection
<!-- ********* Main container start ******* -->
<div class="main-container">
    <!--******** Content wrapper start *********-->
    <div class="content-wrapper">
        @if (Auth::user()->type == 1)
            <!-- Row starts -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title  text-center">عرض سريع</div>
                        </div>
                        <div class="card-body">

                            <!-- Row starts -->
                            <div class="row gutters">
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="ticket-status-card text-center">
                                        <h6>المستخدمين</h6>
                                        <h3>{{ App\Models\User::count() }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="ticket-status-card text-center">
                                        <h6>الأقسام</h6>
                                        <h3>{{ App\Models\Section::count() }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="ticket-status-card text-center">
                                        <h6>المنتجات</h6>
                                        <h3>{{ App\Models\Product::count() }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="ticket-status-card text-center">
                                        <h6>دخل الشهر الحالي</h6>
                                        <h3>{{ $report_month }}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="ticket-status-card text-center">
                                        <h6>رأس المال</h6>
                                        <h3>العرض غير متوفر</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="ticket-status-card text-center">
                                        <h6>المشتريات</h6>
                                        <h3>{{ App\Models\Order::count() }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Row ends -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Row ends -->
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title text-right">الارباح الاسبوعية</div>
                        </div>
                        <div class="card-body">
                            <div class="chartist area-scheme-one">
                                <div class="areaChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        @elseif(Auth::user()->type == 0)
            <h1 class="text-center">مرحبا بك</h1>
        @endif
    </div>
    <!-- Content wrapper end -->
</div>

<!-- ************ Main container end ******** -->
@endsection
@section('script')
<!-- Chartist JS -->
<script src="{{ asset('asset/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('asset/vendor/chartist/js/chartist-tooltip.js') }}"></script>
<!-- Rating JS -->
<script src="{{ asset('asset/vendor/rating/raty.js') }}"></script>
<script src="{{ asset('asset/vendor/rating/raty-custom.js') }}"></script>
<script>
    new Chartist.Line('.areaChart', {
        labels: ['الاحد', 'السبت', 'الجمعة', 'الخميس', 'الاربعاء', 'الثلاثاء', 'الاثنين'],
        series: [
            [{
                    meta: 'الربح',
                    value: {{ $arry_days['sun'] }}
                },
                {
                    meta: 'الربح',
                    value: {{ $arry_days['sat'] }}
                },
                {
                    meta: 'الربح',
                    value: {{ $arry_days['fri'] }}
                },
                {
                    meta: 'الربح',
                    value: {{ $arry_days['thu'] }}
                },
                {
                    meta: 'الربح',
                    value: {{ $arry_days['wed'] }}
                },
                {
                    meta: 'الربح',
                    value: {{ $arry_days['tue'] }}
                },
                {
                    meta: 'الربح',
                    value: {{ $arry_days['mun'] }}
                },
            ]
        ]
    }, {
        low: 0,
        lineSmooth: true,
        showArea: true,
        showLine: true,
        showPoint: true,
        showLabel: true,
        fullWidth: true,
        height: "240px",
        chartPadding: {
            right: 20,
            left: 20,
            bottom: 20,
            top: 20
        },
        axisX: {
            showGrid: true,
            showLabel: true,
        },
        axisY: {
            showGrid: true,
            showLabel: true,
        },
        plugins: [
            Chartist.plugins.tooltip()
        ],
    });
</script>
@endsection
