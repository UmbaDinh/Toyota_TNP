@extends('layouts.admin')


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
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card tryal-gradient">
                                        <div class="card-body tryal row">
                                            <div class="col-xl-7 col-sm-6">
                                                <h2>Xin chào mừng bạn đã đến với</h2>
                                                <span>Toyota Thập Nhất Phong</span>
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
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div style="margin-top: -30px;">
                                        <h4 class="fs-20 font-w700">Thông báo</h4>
                                        <span class="fs-14 font-w400">Dưới đây là danh sách những thông báo quan
                                            trọng</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fs-18">Xem
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


                    <div class="row">

                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-3">
                                            <div class="card">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700">562</h2>
                                                            <span class="fs-18 font-w500 d-block">Total Clients</span>
                                                            <span class="d-block fs-16 font-w400"><small
                                                                    class="text-danger">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-3">
                                            <div class="card">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700">892</h2>
                                                            <span class="fs-18 font-w500 d-block">New Projects</span>
                                                            <span class="d-block fs-16 font-w400"><small
                                                                    class="text-success">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers1"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-3">
                                            <div class="card">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700">892</h2>
                                                            <span class="fs-18 font-w500 d-block">New Projects</span>
                                                            <span class="d-block fs-16 font-w400"><small
                                                                    class="text-success">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers1"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-3">
                                            <div class="card">
                                                <div class="card-body d-flex px-4  justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <h2 class="fs-32 font-w700">892</h2>
                                                            <span class="fs-18 font-w500 d-block">New Projects</span>
                                                            <span class="d-block fs-16 font-w400"><small
                                                                    class="text-success">-2%</small> than last month</span>
                                                        </div>
                                                    </div>
                                                    <div id="NewCustomers1"></div>
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
