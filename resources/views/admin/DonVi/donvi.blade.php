@extends('layouts.admin')


@push('script')
    <script src="{{ asset('ad_as/js/DonVi/donvi.js') }}"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">QL Công Ty</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Đơn vị</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách đơn vị</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display data-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Số TT</th>
                                            <th>Mã đơn vị</th>
                                            <th>Tên đơn vị</th>
                                            <th>Trạng thái</th>
                                            <th style="text-align: center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <th></th>
                                        <th>Mã đơn vị</th>
                                        <th>Tên đơn vị</th>
                                        <th>Trạng thái</th>
                                        <th style="text-align: center">Thao tác</th>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Add modal Chi tiết KPI --}}
@include('admin.ChiTietKPI.chitietkpi_modal')

