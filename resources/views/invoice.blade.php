@extends('layouts.app')
@section('title')
عرض_الفاتورة
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">الرئيسية</li>
<li class="breadcrumb-item"> الطلبات</li>
<li class="breadcrumb-item active"> الفاتورة</li>
@endsection
@section('content')
<!-- Content wrapper start -->
<div class="content-wrapper">


<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
        <div class="card">
            <div class="card-body p-0">
                <div class="invoice-container" id="print-area">
                    <div class="invoice-header">
                        
                        <!-- Row start --> 
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <a href="" class="invoice-logo">
                                    <img src="{{asset('asset/img/logo-dark.png')}}" alt="Wafi Admin Dashboard" />
                                </a>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <h3>
                                    شركة عمار الاستثمارية المحدودة
                                </h3>
                                <h6>
                                     رقم الهاتف :0995989416/0123729198
                                </h6>
                                <h6>
                                ammaribra184@gmail.com : الاميل 
                                </h6>
                                <h6>
                                www.http//ammar_dev.com : الموقع 
                                </h6>
                                <h6>
                                ~~~~~~~~~~~~~~~~~~~~~~~~~~
                                </h6>
                            </div>
                        </div>
                        <!-- Row end -->
                        <!-- Row start --> 
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                <h3>
                                       فاتورة
                                </h3>
                            </div>
                        </div>
                        <!-- Row end -->
                        
                        <!-- Row start -->
                        <div class="row gutters">
                            
                            <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                                <div class="invoice-details">
                                    <div class="invoice-num">
                                        <div>#00{{$client->id}} - رقم الفاتورة</div>
                                        <div>{{$client->created_at->toFormattedDateString()}} - التاريخ</div>
                                    </div>
                                </div>													
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
                                <div class="invoice-details">
                                <div class="invoice-num">
                                        <div>اسم العميل - {{$client->name}}</div>
                                        <div>رقم العميل - {{$client->phone}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                        
                    </div>
                   
                    <div class="invoice-body">

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>مجموع</th>
                                                <th>سعر الوحدة</th>
                                                <th>الكمية</th>
                                                <th>الوحدة</th>
                                                <th>اسم المنتج</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             $total = 0;
                                            ?>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                {{$order->total}} 
                                                </td>
                                                <td>{{$order->price_sale}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td>{{$order->product_unit}}</td>
                                                <td>{{$order->product_name}}</td>
                                            </tr>
                                            <?php
                                             $total = $total + $order->total;
                                            ?>
                                            @endforeach
                                            @if($client->axing != 0)
                                            <tr>                         
                                                <td colspan="1">    
                                                    <h6 class=""><strong>${{$client->axing}}</strong></h6>
                                                </td>			
                                                <td>    
                                                    <h6 class=""><strong>تخفيض</strong></h6>
                                                </td>
                                            </tr>
                                            <tr> 
                                            @endif                        
                                                <td colspan="1">    
                                                    <h5 class=""><strong>${{$total - $client->axing}}</strong></h5>
                                                </td>			
                                                <td>    
                                                    <h5 class=""><strong>المجموع</strong></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                    <div class="invoice-footer">
                        شكرا لاختيارنا 
                    </div>

                </div>
            </div>
        </div>

        <div class="custom-actions-btns mb-5">
            <button class="btn btn-dark print-btn">
                <i class="icon-printer"></i> طبع
            </button>
        </div>

    </div>
    
</div>
<!-- Row end -->

</div>
<!-- Content wrapper end -->
@endsection
@section('script')
<script src="{{asset('asset/js/printThis.js')}}"></script>
<script>
//print order
    $(document).on('click', '.print-btn', function() {

        $('#print-area').printThis();

    });//end of click function
</script>
@endsection
