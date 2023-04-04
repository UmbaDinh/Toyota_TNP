@extends('layouts.nhanvien')


@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
    <style type="text/css">
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #393939;
            border-radius: 1rem;
            padding: 2px 0;
            margin-bottom: -40px;
        }
    </style>
@endpush

@push('script')
@endpush


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="row">
                                        @isset($DiemKPIThang)
                                            @foreach ($DiemKPIThang as $diemkpithang)
                                                @if ($loop->even)
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="card draggable-handle draggable" tabindex="0">
                                                                <div class="card-body">
                                                                    <div class="d-flex justify-content-between mb-3">
                                                                        <span class="text-danger">
                                                                            <svg class="me-2" width="10" height="10"
                                                                                viewBox="0 0 10 10" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="5" cy="5"
                                                                                    r="5" fill="#FC2E53"></circle>
                                                                            </svg>
                                                                            Nhân viên tiêu biểu {{ $loop->even + 1 }}
                                                                        </span>
                                                                    </div>
                                                                    <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                            class="text-black">{{ $diemkpithang->ten_nhanvien }} </a></p>
                                                                    <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                            class="text-black">{{ $diemkpithang->id_donvi }}</a></p>
                                                                    <div class="progress default-progress my-4">
                                                                        <div class="progress-bar bg-danger progress-animated"
                                                                            style="width: 45%; height:10px;" role="progressbar">
                                                                            <span class="sr-only">45% Complete</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row justify-content-between align-items-center kanban-user">
                                                                        <ul class="users col-6">
                                                                            <span class="fs-14"><i
                                                                                    class="far fa-dot-circle me-2"></i>
                                                                                Số điểm: {{ $diemkpithang->diem_kpi }}</span>
                                                                        </ul>
                                                                        <div class="col-6 d-flex justify-content-end">
                                                                            <span class="fs-14"><i
                                                                                    class="far fa-clock me-2"></i>Tháng
                                                                                    {{ $diemkpithang->thang_kpi }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="card draggable-handle draggable" tabindex="0">
                                                                <div class="card-body">
                                                                    <div class="d-flex justify-content-between mb-3">
                                                                        <span class="text-danger">
                                                                            <svg class="me-2" width="10" height="10"
                                                                                viewBox="0 0 10 10" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="5" cy="5"
                                                                                    r="5" fill="#FC2E53"></circle>
                                                                            </svg>
                                                                            Nhân viên tiêu biểu {{ $loop->even + 1 }}
                                                                        </span>
                                                                    </div>
                                                                    <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                            class="text-black">{{ $diemkpithang->ten_nhanvien }}</a></p>
                                                                    <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                            class="text-black">{{ $diemkpithang->id_donvi }}</a></p>
                                                                    <div class="progress default-progress my-4">
                                                                        <div class="progress-bar bg-danger progress-animated"
                                                                            style="width: 45%; height:10px;" role="progressbar">
                                                                            <span class="sr-only">45% Complete</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row justify-content-between align-items-center kanban-user">
                                                                        <ul class="users col-6">
                                                                            <span class="fs-14"><i
                                                                                    class="far fa-dot-circle me-2"></i>
                                                                                Số điểm: {{ $diemkpithang->diem_kpi }}</span>
                                                                        </ul>
                                                                        <div class="col-6 d-flex justify-content-end">
                                                                            <span class="fs-14"><i
                                                                                    class="far fa-clock me-2"></i>Tháng
                                                                                    {{ $diemkpithang->thang_kpi }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endisset
                                    </div>

                                </div>
                                <div class="col-xl-5">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div style="margin-top: -30px;">
                                                <h4 class="fs-20 font-w700">Thông báo</h4>
                                                <span class="fs-14 font-w400">Dưới đây là danh sách những thông báo quan
                                                    trọng</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-primary btn-rounded fs-18">Xem
                                                    tất cả</a>
                                            </div>
                                        </div>
                                        <div class="card-body px-0" style="margin-top: -45px">
                                            <div class="d-flex justify-content-between recent-emails">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display data-table">
                                                        <thead>
                                                            <tr style="padding: 0px 0px">
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($getThongBao as $getthongbao)
                                                                <tr>
                                                                    <td style="width: 420px;">
                                                                        <div class="d-flex">
                                                                            <div class="profile-k">
                                                                                <span class="bg-success">TB
                                                                                    {{ $getthongbao->ID_THONGBAO }}</span>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <h4 class="fs-18 font-w500"
                                                                                    style="line-height: 0.5; margin-top: 5px; margin-bottom: 5px !important">
                                                                                    {{ $getthongbao->TIEUDE_THONGBAO }}</h4>
                                                                                <span
                                                                                    class="font-w400 d-block">{{ $getthongbao->NOIDUNG_THONGBAO }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 20px;">
                                                                        <div class="email-check">
                                                                            <label class="like-btn mb-0">
                                                                                <a href="{{ asset('uploads/ThongBao') }}/{{ $getthongbao->upload_file }}"
                                                                                    target="_blank">
                                                                                    <span class="checkmark"></span>
                                                                                </a>
                                                                            </label>
                                                                        </div>
                                                                    </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
