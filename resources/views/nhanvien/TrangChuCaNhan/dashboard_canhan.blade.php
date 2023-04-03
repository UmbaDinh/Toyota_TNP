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
                                    <h4 class="card-title">Thông báo chi tiết</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="mb-3">
                                            @foreach ($TTDonVi as $ttdonvi)
                                                @foreach ($TTCaNhan as $ttcanhan)
                                                    @if ($ttcanhan->id_donvi == $ttdonvi->id_donvi)
                                                        <h4 class="fs-24 font-w700">{{ Auth::user()->name }} - {{$ttdonvi->ten_dv  }}</h4>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <div class="d-flex align-items-center mt-4 flex-wrap">
                                                <h4>Lý do thông báo</h4>
                                            </div>	
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center mb-4 pb-3 justify-content-end flex-wrap">
                                                <div class="me-3">
                                                    <h4 class="fs-18 font-w600">Tháng 3</h4>
                                                </div>
                                            </div>
                                            <div class="d-flex  justify-content-end align-items-center">
                                                <span class="fs-16 font-w600 me-3">Điểm cộng - trừ</span>
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
