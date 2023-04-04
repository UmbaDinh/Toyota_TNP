@extends('layouts.nhanvien')


@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
    <style type="text/css">

    </style>
@endpush

@push('script')
@endpush


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card tryal-gradient">
                                        <div class="card-body tryal row">
                                            <div class="col-xl-7 col-sm-6">
                                                <h2>Thống kê điểm tháng 3</h2>
                                                @isset($DiemKPIThang)
                                                    @foreach ($DiemKPIThang as $item)
                                                        @if ($item->ten_nhanvien == Auth::user()->name)
                                                            <h2>Điểm hiện tại: {{ $item->diem_kpi }} </h2>
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </div>
                                            <div class="col-xl-5 col-sm-6">
                                                <img src="{{ asset('ad_as/images/admin/logo_01.png') }}" alt=""
                                                    class="sd-shape">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    @foreach ($TTDonVi as $ttdonvi)
                                        @foreach ($TTCaNhan as $ttcanhan)
                                            @if ($ttcanhan->id_donvi == $ttdonvi->id_donvi)
                                                <h4 class="card-title" style="margin-top: 5px">Thông báo chi tiết
                                                    <br>
                                                    <span style="color: green">{{ Auth::user()->name }}</span>
                                                    -
                                                    {{ $ttdonvi->ten_dv }}
                                                </h4>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @isset($TT_Log_CaNhan)
                                        @foreach ($TT_Log_CaNhan as $tt_log_canhan)
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
                                                                            <circle cx="5" cy="5" r="5"
                                                                                fill="#FC2E53"></circle>
                                                                        </svg>
                                                                        Thông báo lần {{ $loop->even +1 }}
                                                                    </span>
                                                                </div>
                                                                <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                        class="text-black">{{ $tt_log_canhan->chitiet_kpi }}</a></p>
                                                                <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                        class="text-black">{{ $tt_log_canhan->lydo }}</a></p>
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
                                                                            Số điểm: {{ $tt_log_canhan->diem }}</span>
                                                                    </ul>
                                                                    <div class="col-6 d-flex justify-content-end">
                                                                        <span class="fs-14"><i
                                                                                class="far fa-clock me-2"></i>Tháng: {{ $tt_log_canhan->thang }}
                                                                            </span>
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
                                                                            <circle cx="5" cy="5" r="5"
                                                                                fill="#FC2E53"></circle>
                                                                        </svg>
                                                                        Thông báo lần {{ $loop->even +1 }}
                                                                    </span>
                                                                </div>
                                                                <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                        class="text-black">{{ $tt_log_canhan->chitiet_kpi }}</a></p>
                                                                <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                                                        class="text-black">{{ $tt_log_canhan->lydo }}</a></p>
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
                                                                            Số điểm: {{ $tt_log_canhan->diem }}</span>
                                                                    </ul>
                                                                    <div class="col-6 d-flex justify-content-end">
                                                                        <span class="fs-14"><i
                                                                                class="far fa-clock me-2"></i>Tháng: {{ $tt_log_canhan->thang }}
                                                                            </span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
