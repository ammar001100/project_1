@extends('layouts.app')
@section('title')
    المستخدمين
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('asset/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />
@section('breadcrumb')
    <li class="breadcrumb-item">الرئيسية</li>
    <li class="breadcrumb-item active"> المستخدمين</li>
@endsection
@section('content')
    @include('include.error')
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters text-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="t-header">
                        <button class="btn btn-secondary" type="button">
                            <span class="badge badge-pill badge-white">{{ $employees->count() }}</span>
                            <span class="badge badge-pill badge-white">المستخدمين</span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="scrollVertical" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>الاجراء</th>
                                    <th>تاريخ الانشاء</th>
                                    <th>الوظيفة</th>
                                    <th>رقم الهاتف</th>
                                    <th>الاميل</th>
                                    <th>الاسم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>
                                            <a class="btn btn-info btn-sm @if (auth()->user()->permissions->employee_update == 0) disabled @endif"
                                                href="{{ route('order.my', $employee->id) }}" type="submit">الطلبات</a>
                                            <a class="btn btn-primary btn-sm @if (auth()->user()->permissions->employee_update == 0 or $employee->type == 1 or $employee->id == auth()->user()->id) disabled @endif"
                                                href="{{ route('employee.edit', $employee->id) }}" type="submit">تعديل</a>
                                            <a class="btn btn-danger btn-sm @if (auth()->user()->permissions->employee_delete == 0 or $employee->type == 1 or $employee->id == auth()->user()->id) disabled @endif"
                                                href="{{ route('employee.delete', $employee->id) }}" type="submit">حذف</a>
                                        </td>
                                        <td>{{ $employee->created_at }}</td>
                                        <td>{{ $employee->job }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links('vendor.pagination.bootstrap-5') }}
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
