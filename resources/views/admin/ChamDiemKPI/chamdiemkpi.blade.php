@extends('layouts.admin')

@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
    <style type="text/css">
        .nice-select.wide {
            line-height: 2.8125rem;
            color: black; 
            font-weight: bold
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('ad_as/js/ChamDiemKPI/chamdiemkpi.js') }}"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">KPI</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Chấm điểm KPI</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="margin-top: 3px; margin-bottom: 3px; width: 150px;">Chọn đơn vị</h4>
                            <select class="form-select" aria-label="Default select example" id="select_donvi">
                                <option selected="" value="0">Chưa chọn đơn vị</option>
                                @isset($DonVi)
                                    @foreach ($DonVi as $item)
                                        <option value="{{ $item->id_donvi }}-{{ $item->ten_dv }}">{{ $item->ten_dv }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display data-table" style="min-width: 200px">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">Họ tên</th>
                                            <th style="text-align: center" style="width: 100px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr>
                                            <td>Võ Huỳnh Hữu Tân</td>
                                            <td style="text-align: center">Chấm điểm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        {{-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                                class="nav-link active show">Thông tin</a>
                                        </li> --}}
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                class="nav-link active show">Chấm điểm KPI</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="profile-settings" class="tab-pane fade active show">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    {{-- <h4 class="text-primary">Thông tin cá nhân</h4> --}}
                                                        <form style="color: black; font-weight: bold" action="/admin/chamdiem-kpi" id="form-chamdiem-kpi">
                                                            <input type="hidden" name="id_chamdiem" id="id_chamdiem">
                                                            <input type="hidden" name="id_nhanvien" id="id_nhanvien">
                                                            <input type="hidden" name="id_donvi" id="id_donvi">
                                                            <div class="row" >
                                                                <div class="mb-3 col-md-6">
                                                                    <label  class="form-label">Họ và tên</label>
                                                                    <input name="ho_ten" style="color: black; font-weight: bold"  type="text" placeholder="Họ và tên" value="" class="form-control ht_nhanvien" readonly>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Đơn vị</label>
                                                                    <input name="ten_donvi" style="color: black; font-weight: bold" type="email" placeholder="Tên đơn vị" value="" class="form-control ten_donvi" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    @isset($CT_KPI)
                                                                            <label class="form-label">Chi tiết KPI</label>
                                                                            <select class="form-control default-select wide" id="inputState" name="chitiet_kpi" style="color: black; font-weight: bold">
                                                                                <option value="#" selected="">Chọn chi tiết KPI</option>
                                                                                @foreach ($CT_KPI as $ct_kpi)
                                                                                    <option  value="{{ $ct_kpi->id_ct_kpi  }}">{{ $ct_kpi->ten_ct_kpi  }}</option>
                                                                                @endforeach
                                                                            </select>  
                                                                    @endisset
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Số điểm cộng/trừ</label>
                                                                    <input name="diem_cong_tru" style="color: black; font-weight: bold" type="text" placeholder="Cộng (5) / Trừ (-5)" value=""  class="form-control diem_cong_tru">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Lý do</label>
                                                                <textarea name="lydo" class="form-control" rows="4" id="comment"></textarea>
                                                            </div>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">Hình ảnh minh chứng</span>
                                                                    <div class="form-file">
                                                                        <input name="hinh_anh_minh_chung" type="file" class="form-file-input form-control">
                                                                    </div>
                                                                </div>
                                                            <div class="row" >
                                                                <div style="text-align: right">
                                                                    <button class="btn btn-primary" id="btn_cham_diem" type="submit" >Chấm điểm</button>
                                                                </div>
                                                            </div>
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
            </div>
        </div>
    </div>
@endsection

{{-- Add modal Chi tiết KPI --}}
@include('admin.ChamDiemKPI.chamdiemkpi_modal')
