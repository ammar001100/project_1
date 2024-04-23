@extends('layouts.app')
@section('title')
    الطلبات
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('asset/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item active"> الطلبات</li>
@endsection
@section('content')
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters text-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="t-header">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <input onKeyUp="ser()" class="v form-control" type="search" id="val">


                        </div>
                        <div class="dr dropdown">



                        </div>
                        <button class="btn btn-secondary" type="button">
                            <span class="badge badge-pill badge-white">{{ $clients->count() }}</span>
                            <span class="badge badge-pill badge-white">الطلبات</span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>الاجراء</th>
                                    <th>التاريخ</th>
                                    <th>رقم الطلب</th>
                                    <th>اسم العميل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('order.delete', $client->id) }}">ارجاع</a>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('invoice', $client->id) }}">عرض</a>
                                        </td>
                                        <td>{{ $client->created_at->toFormattedDateString() }}</td>
                                        <td>#00{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function ser() {

            var s = $('.v').val();

            $.ajax({
                url: "{{ route('order.search') }}",
                type: "post",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'word': s,
                },
                success: function(data) {
                    if (data.c <= 0) {

                        $('.dr').html(data.res);
                    } else {
                        $('.dr').html(data.res);

                    }

                },
                error(reject) {
                    alert("هناك خطاء");
                }
            });
        }
    </script>
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
@endsection
