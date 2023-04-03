@extends('layouts.admin')

@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
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
                            <div class="modal fade" id="cameraModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Upload images</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <th style="text-align: center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($NhanVien as $item)
                                            @foreach ($DonVi as $item_donvi )
                                                @if ( $item_donvi->id_donvi == $item->id_donvi )
                                                   <input type="hidden" value=" {{ $ten_donvi = $item_donvi->ten_dv }}">
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <img class="rounded-circle" width="35" src="{{ asset("uploads/HinhAnh_NhanVien") }}/{{ $item->hinh_anh }}" alt="">
                                                </td>
                                                <td>{{ $item->ho_ten }}</td>
                                                <td>{{ $item->gioi_tinh }}</td>
                                                <td>{{ $ten_donvi }}</td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn btn-rounded btn-info">
                                                        <span class="btn-icon-start text-info">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>Sửa
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" class="btn btn-rounded btn-danger">
                                                        <span class="btn-icon-start text-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </span>Xóa
                                                    </button>
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
@endsection
@section('user-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
