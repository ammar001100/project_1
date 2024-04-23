@extends('layouts.app')
@section('title')
    المنتجات
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('asset/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"> المنتجات</li>
    <li class="breadcrumb-item active"> تقرير</li>
@endsection
@section('content')
    @include('include.error')
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="table-container">
                    <div class="t-header">المنتجات</div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>القسم</th>
                                    <th>الوحدة</th>
                                    <!--<th>الربح</th>-->
                                    <th>متبقي</th>
                                    <th>مباع</th>
                                    <th>الكمية</th>
                                    <th>انتهاء الصلاحية</th>
                                    <th>اسم المنتج</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <?php
                                    $sale = 0;
                                    $won = 0;
                                    $wons = 0;
                                    ?>
                                    @foreach ($orders as $order)
                                        @if ($product->id == $order->product_id)
                                            <?php
                                            $sale = $sale + $order->quantity;
                                            $won = $product->price_sale - $product->price;
                                            $wons = $wons + $won * $order->quantity;
                                            ?>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td>{{ $product->section->name }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <!-- <td>{{ $wons }}</td> -->
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $sale }}</td>
                                        <td>{{ $product->stock + $sale }}</td>
                                        <td>
                                            <?php
                                            $p = new Carbon\Carbon($product->date_p);
                                            $e = new Carbon\Carbon($product->date_e);
                                            $n = new Carbon\Carbon();
                                            if ($n->lte($e)) {
                                                $coun = $n->diffInDays($e);
                                                echo '<button class="btn btn-outline-success" type="button">
                                                                                                                  ينتهي بعد
                                                                                                                  ' .
                                                    $coun .
                                                    '
                                                                                                                  يوم
                                                                                                                  </button>';
                                            } else {
                                                $coun_ = $n->diffInDays($e);
                                                echo '<button class="btn btn-outline-secondary" type="button">
                                                                                                                  منتهي قبل
                                                                                                                  ' .
                                                    $coun_ .
                                                    '
                                                                                                                  يوم
                                                                                                                  </button>';
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $product->name }}</td>
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
