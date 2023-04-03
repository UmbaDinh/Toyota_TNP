@extends('layouts.admin')

@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
@endpush

@push('script')
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Quản lý đơn vị
                            <a href="#" data-bs-toggle="modal" data-bs-target="#AddDonViModal" class="btn btn-rounded btn-primary btn-sm float-end">Thêm đơn vị</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th  style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã đơn vị</th>
                                        <th  style="text-align: center">Tên đơn vị</th>
                                        <th  style="text-align: center">Trạng thái</th>
                                        <th  style="text-align: center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal Add Đơn vị-->
    <div class="modal fade" id="AddDonViModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm đơn vị</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="AddDonViFORM" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <ul class="alert alert-warning d-none" id="save_errorList"></ul>
                    <div class="row">
                        <div class="form-group mb-3 col-12">
                            <label>Mã Đơn Vị</label>
                            <input type="text" name="ma_dv" class="form-control" placeholder="Nhập mã đơn vị">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3 col-12">
                            <label>Tên Đơn Vị</label>
                            <input type="text" name="ten_dv" class="form-control" placeholder="Nhập mã đơn vị">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3">
                            <label>Trạng Thái</label>
                            <select class="form-select" aria-label="Default select example" id="hoat_dong" name="hoat_dong">
                                <option value="1" selected>Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<!-- End Modal Add Đơn vị-->

<!-- Modal Edit NhanVien-->
    <div class="modal fade" id="EditDonViModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin đơn vị</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="UpdateDonViFORM" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <input type="hidden" name="id_donvi" id="id_donvi">

                    <ul class="alert alert-warning d-none" id="update_errorList"></ul>

                    <div class="row">
                        <div class="form-group mb-3 col-12">
                            <label>Mã Đơn Vị</label>
                            <input type="text" id="edit_ma_dv" name="ma_dv" class="form-control" placeholder="Nhập mã đơn vị">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3 col-12">
                            <label>Tên Đơn Vị</label>
                            <input type="text" id="edit_ten_dv" name="ten_dv" class="form-control" placeholder="Nhập mã đơn vị">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3">
                            <label>Trạng Thái</label>
                            <select class="form-select" aria-label="Default select example" id="edit_hoat_dong" name="hoat_dong">
                                <option value="1" selected>Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<!-- End Modal Edit NhanVien-->

<!-- Modal Delete NhanVien-->
    <div class="modal fade" id="DeleteDonViModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa đơn vị ? </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                    <h3>Bạn có muốn xóa đơn vị này không ?</h3>
                    <input type="hidden" id="delete_id_donvi">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" class="delete_modal_btn btn btn-primary">Xóa</button>
                </div>
        </div>
        </div>
    </div>
<!-- End Modal Delete NhanVien-->



