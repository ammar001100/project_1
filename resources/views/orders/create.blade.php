@extends('layouts.app')
@section('title')
    اضافة_طلب
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item"> الطلبات</li>
    <li class="breadcrumb-item active"> اضافة</li>
@endsection
@section('content')
    @include('include.error')
    @include('include.errors')
    <!-- **************** Main container start ************* -->
    <div class="main-container">
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="custom-btn-group">
                                <!-- Buttons -->
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#addNewTaskX">
                                    <span class="badge badge-pill badge-white">{{ $temp->axing }}</span>
                                    تخفيض
                                </button>
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target=".bd-example-modal-xl">اضافة عميل</button>
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#addNewTask">اضافة منتجات</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="custom-btn-group">
                                <a type="button" href="{{ route('order.add') }}"
                                    class="btn btn-primary btn-block">موافق</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center">
                                    <thead>
                                        <tr>
                                            <th>العموان</th>
                                            <th>رقم الهاتف</th>
                                            <th>اسم العميل</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td>{{ $temp->client_address }}</td>
                                            <td>{{ $temp->client_number }}</td>
                                            <td>{{ $temp->client_name }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>الاجراء</th>
                                            <th>الكمية</th>
                                            <th>الوحدة </th>
                                            <th>سعر </th>
                                            <th>اسم المنتج</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tempp as $tmp)
                                            <tr>
                                                <td>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('temp.delete', $tmp->id) }}" type="submit">حذف</a>
                                                </td>
                                                <td>{{ $tmp->quantity }}</td>
                                                <td>{{ $tmp->product_unit }}</td>
                                                <td>{{ $tmp->product_price_sale }}</td>
                                                <td>{{ $tmp->product_name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Row end -->
            <!-- CLIENT modal -->
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">اضافة عميل</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('temp.client.add') }}" method="POST">
                                @csrf
                                <div class="form-group text-center">
                                    <label for="recipient-name" class="col-form-label">الاسم</label>
                                    <input type="text" name="client_name" class="form-control text-center"
                                        id="recipient-name">
                                </div>
                                <div class="form-group text-center">
                                    <label for="message-text" class="col-form-label">رقم الهاتف</label>
                                    <input type="text" name="client_number" class="form-control text-center"
                                        id="message-text">
                                </div>
                                <div class="form-group text-center">
                                    <label for="client_address" class="col-form-label">العنوان</label>
                                    <input type="text" name="client_address" class="form-control text-center"
                                        id="client_address">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END CLIENT modal -->
            <!-- AXING modal -->
            <div class="modal fade" id="addNewTaskX" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">اضافة تخفيض</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('temp.client.axing.add') }}" method="POST">
                                @csrf
                                <div class="form-group text-center">
                                    <label for="recipient-name" class="col-form-label">قيمة التخفيض</label>
                                    <input type="number" step="0.01" name="axing" class="form-control text-center"
                                        id="recipient-name">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END AXING modal -->
            <!-- PRODUCT modal -->
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">
                <div class="tasks-container">
                    <div class="modal fade " id="addNewTask" tabindex="-1" role="dialog"
                        aria-labelledby="addNewTaskLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewTaskLabel">شراء منتج</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="table-container">
                                            <div class="t-header">المنتجات</div>
                                            <div class="table-responsive">
                                                <form action="{{ route('temp.product.add') }}" method="POST">
                                                    @csrf
                                                    <table id="copy-print-csv" class="table custom-table">
                                                        <thead>
                                                            <tr>
                                                                <th>الاجراء</th>
                                                                <th>المخزن</th>
                                                                <th>الوحدة</th>
                                                                <th>تاريخ الانتهاء</th>
                                                                <th>سعر البيع</th>
                                                                <th>اسم المنتج</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($products as $product)
                                                                <tr>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-sm"
                                                                            type="submit">شراء</button>
                                                                    </td>
                                                                    <input type="hidden" id="{{ $product->id }}"
                                                                        name="product_id" value="{{ $product->id }}">
                                                                    <td>{{ $product->stock }}</td>
                                                                    <td>{{ $product->unit }}</td>
                                                                    <td>{{ $product->date_e }}</td>
                                                                    <td>{{ $product->price_sale }}</td>
                                                                    <td>{{ $product->name }}</td>
                                                                </tr>
                                                            @endforeach
                                                            <h4 class="text-center">الكميةالمطلوبة</h4>
                                                            <input type="number" name="quantity"
                                                                class="form-control text-center">
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PRODUCTS modal -->
        </div>
        <!-- Content wrapper end -->
    </div>
    <!-- *************** Main container end ******** -->
@endsection
@section('script')
    <!-- Data Tables -->
    <script src="{{ asset('asset/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- Custom Data tables -->
    <script src="{{ asset('asset/vendor/datatables/custom/custom-datatables_edit.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/custom/fixedHeader.js') }}"></script>
    <script>
        $('.toast').toast('show')
    </script>
@endsection
