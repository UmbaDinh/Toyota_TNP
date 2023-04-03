@extends('layouts.admin')

@push('script')
    <script src="{{ asset('ad_as/js/ChiTietKPI/chitietkpi.js') }}"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Chi tiết KPI</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách KPI</h4>
                            <button type="button" class="btn btn-rounded btn-success btn_add_ct_kpi">
                                <span class="btn-icon-start text-success">
                                    <i class="fa fa-plus color-success"></i>
                                </span>Thêm
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display data-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Chi tiết KPI</th>
                                            <th style="text-align: center">Điểm</th>
                                            <th style="text-align: center">Tháng</th>
                                            <th style="text-align: center">Trạng thái</th>
                                            <th style="text-align: center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @isset($ChiTietKPI)
                                            @foreach ($ChiTietKPI as $item_ct_kpi)
                                                <tr>
                                                    <td>{{ $item_ct_kpi->ten_ct_kpi }}</td>
                                                    <td style="text-align: center">{{ $item_ct_kpi->diem_ct_kpi }}</td>
                                                    <td style="text-align: center">{{ $item_ct_kpi->thang_ct_kpi }}</td>
                                                    @if ($item_ct_kpi->trangthai_ct_kpi == 1)
                                                        <td style="text-align: center">
                                                            <span class="badge light badge-success">Hoạt động</span>
                                                        </td>
                                                    @else
                                                        <td style="text-align: center">
                                                            <span class="badge light badge-danger">Ngừng hoạt động</span>
                                                        </td>
                                                    @endif
                                                    <td style="text-align: center">
                                                        <button type="button" class="btn btn-rounded btn-info">
                                                            <span class="btn-icon-start text-info">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </span>Sửa
                                                        </button>
                                                        &nbsp;
                                                        <button type="button" class="btn btn-rounded btn-danger btn_xoa_ct_kpi"
                                                            data="{{ $item_ct_kpi->id_ct_kpi }}">
                                                            <span class="btn-icon-start text-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </span>Xóa
                                                        </button>
                                                </tr>
                                            @endforeach
                                        @endisset --}}
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

