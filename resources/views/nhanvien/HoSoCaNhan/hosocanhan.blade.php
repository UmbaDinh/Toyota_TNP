@extends('layouts.nhanvien')


@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
@endpush

@push('script')
@endpush


@section('content')
    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">


            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Thông tin</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Hồ sơ cá nhân</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded">
                                    {{-- <img src="" class="cover-photo rounded" alt=""> --}}
                                </div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="{{ asset('uploads/HinhAnh_NhanVien/1676112569.jpg') }}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        @foreach ($TTDonVi as $ttdonvi)
                                            @foreach ($TTCaNhan as $ttcanhan)
                                                @if ($ttcanhan->id_donvi == $ttdonvi->id_donvi)
                                                    <h4 class="text-primary mb-0">{{ Auth::user()->name }} - {{$ttdonvi->ten_dv  }}</h4>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <p>{{ Auth::user()->email }}</p>
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
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        {{-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                                class="nav-link active show">Thông tin</a>
                                        </li> --}}
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                class="nav-link active show">Thông tin cá nhân</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="profile-settings" class="tab-pane fade active show">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    {{-- <h4 class="text-primary">Thông tin cá nhân</h4> --}}
                                                        <form>
                                                            @foreach ($TTCaNhan as $itemTT_CaNhan)
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Họ và tên</label>
                                                                    <input type="email" placeholder="Họ và tên" value="{{ $itemTT_CaNhan->ho_ten }}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Ngày sinh</label>
                                                                    <input type="date" placeholder="Ngày sinh" value="{{ $itemTT_CaNhan->ngay_sinh }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Giới tính</label>
                                                                    <select class="form-control default-select wide"
                                                                        id="inputState">
                                                                        @if ($itemTT_CaNhan->gioi_tinh == "Nam")
                                                                            <option value="{{ $itemTT_CaNhan->gioi_tinh }}" selected="">{{ $itemTT_CaNhan->gioi_tinh }}</option>
                                                                            <option value="Nữ">Nữ</option>
                                                                        @else
                                                                            <option value="{{ $itemTT_CaNhan->gioi_tinh }}" selected="">{{ $itemTT_CaNhan->gioi_tinh }}</option>
                                                                            <option value="Nam">Nam</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Số điện thoại</label>
                                                                    <input type="text" placeholder="Số điện thoại" value="{{ $itemTT_CaNhan->so_dien_thoai }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Địa chỉ</label>
                                                                <input type="text"
                                                                    placeholder="Địa chỉ"  value="{{ $itemTT_CaNhan->dia_chi_thuong_tru }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label class="form-label">CMND/CCCD</label>
                                                                    <input type="text" placeholder="Chứng minh nhân dân/Căn cước công dân"  value="{{ $itemTT_CaNhan->cmnd }}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Nơi cấp</label>
                                                                    <input type="text" placeholder="Nơi cấp"  value="{{ $itemTT_CaNhan->noi_cap }}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Ngày cấp</label>
                                                                    <input type="date" placeholder="Nơi cấp"  value="{{ $itemTT_CaNhan->ngay_cap }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                    @endforeach
                                                            <button class="btn btn-primary" type="submit">Thay đổi</button>
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
    <!--**********************************
                Content body end
            ***********************************-->
@endsection
