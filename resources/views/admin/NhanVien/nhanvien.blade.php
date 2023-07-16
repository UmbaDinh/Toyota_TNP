@extends('layouts.admin')

@push('script')
    <script src="{{ asset('ad_as/js/NhanVien/nhanvien.js') }}"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">QL Công Ty</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Nhân viên</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách nhân viên</h4>
                            <button type="button" class="btn btn-rounded btn-success btn_add_donvi">
                                <span class="btn-icon-start text-success">
                                    <i class="fa fa-plus color-success"></i>
                                </span>Thêm nhân viên mới
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display data-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Họ tên</th>
                                            <th>Giới tính</th>
                                            <th>Đơn vị</th>
                                            <th>Trạng thái</th>
                                            <th style="text-align: center">Thao tác</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Add modal nhân viên --}}
@include('admin.NhanVien.nhanvien_modal')

