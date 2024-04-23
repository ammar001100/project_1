@extends('layouts.app')
@section('title')
    الخزنة
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item active"> الخزنة</li>
@endsection
@section('content')
    @include('include.errors')
    @include('include.error')

    <?php
    $sale = 0;
    $won = 0;
    $wons = 0;
    $capital_sum = 0;
    $cash = 0;
    $sum = 0;
    
    ?>
    @foreach ($products as $product)
        @foreach ($orders as $order)
            @if ($product->id == $order->product_id)
                <?php
                $sale = $sale + $order->quantity;
                $won = $order->price_sale - $order->price;
                $wons = $wons + $won * $order->quantity;
                //الدخل
                $cash = $cash + ($order->quantity * $order->price_sale - $order->client->axing);
                //مجموع راس المال
                $capital_sum = $capital_sum + $order->quantity * $order->price;
                ?>
            @endif
        @endforeach
        <?php
        $sum = $sum + ($product->price_sale - $product->price) * $product->stock;
        ?>
    @endforeach
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card primary text-center">
                    <div class="card-header">
                        <div class="card-title">النقد - كاش</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $stock->cash }}</h5>
                        <a type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#customModalOne">ايداع</a>
                        <a type="button" class="btn btn-info" data-toggle="modal" data-target="#customModal">سحب</a>
                        <div class="card-sub-title"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card primary text-center">
                    <div class="card-header">
                        <div class="card-title">ارباح منتظرة</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $sum }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card secondary text-center">
                    <div class="card-header">
                        <div class="card-title">الدخل + الكاش</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $stock->cash + $cash }}</h5>
                    </div>
                </div>
            </div>


        </div>
        <!-- Row end -->
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="card-title">مجموع رأس المال - بضاعلة</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $capital + $capital_sum }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="card-title">ارباح محققة</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $report_total }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="card-title">رأس المال المتبقي - بضاعة </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $capital }}</h5>

                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Modal one -->
    <div class="modal fade text-center" id="customModalOne" tabindex="-1" role="dialog"
        aria-labelledby="customModalOneLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customModalOneLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('stock.add_cash') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">
                                <h2>ايداع</h2>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ادخل المبلغ</label>
                            <input type="text" name="add_cash" class="form-control text-center" id="recipient-name">
                        </div>
                </div>
                <div class="modal-footer custom">

                    <div class="left-side">
                        <button type="button" class="btn btn-link danger" data-dismiss="modal">الغاء</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="submit" class="btn btn-link success">موافق</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Modal  -->
    <div class="modal fade text-center" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customModalTwoLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('stock.pull_cash') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">
                                <h2>سحب</h2>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ادخل المبلغ</label>
                            <input type="text" name="pull_cash" class="form-control text-center" id="recipient-name">
                        </div>
                </div>
                <div class="modal-footer custom">

                    <div class="left-side">
                        <button type="button" class="btn btn-link danger" data-dismiss="modal">الغاء</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="submit" class="btn btn-link success">موافق</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <!-- Data Tables -->
    <script src="{{ asset('asset/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $('.toast').toast('show')
    </script>
    <!-- Custom Data tables -->
    <script src="{{ asset('asset/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/custom/fixedHeader.js') }}"></script>

    <!-- Download / CSV / Copy / Print -->
@endsection
