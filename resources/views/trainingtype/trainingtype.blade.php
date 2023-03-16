
@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Chấm KPI</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chấm KPI</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_type"><i class="fa fa-plus"></i> Cộng điểm riêng</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-4">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                            <h3>Lọc tổ</h3>
                            <label class="col-form-label">Bảng đơn vị<span class="text-danger">*</span></label>
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th>Đơn vị</th>
                                            <th class="text-center">Chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CVDV</td>
                                            <td class="text-center">
                                                <input type="checkbox" checked="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Điều phối</td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Markerting</td>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Khối văn phòng</td>
                                            <td class="text-center">
                                                <input type="checkbox"  >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px;">#</th>
                                            <th>Tên KH</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="text">Nguyễn Văn A</td>
                                            <td>
                                                <div class="action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Chấm KPI</a>
                                                </div>  
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="text">Tổ Cố vấn dịch vụ</td>
                                            <td>
                                                <div class="action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                    <i class="fa fa-dot-circle-o text-success"></i> Chấm KPI</a>
                                                </div>  
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
                <div class="col-md-8">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3>Chấm KPI</h3>
                            <form action="http://127.0.0.1:8000/form/training/save" method="POST">
                                <input type="hidden" name="_token" value="Zv1GTFMzr7LNbAAMfV8zs6K2mGTyH4xywx0kOSD9">                            
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Tên Nhân viên<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="training_cost" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Tổ<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="training_cost" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Chọn KPI</label>
                                            <select class="select select2-hidden-accessible" name="status" data-select2-id="select2-data-8-xdso" tabindex="-1" aria-hidden="true">
                                                <option value="Active" data-select2-id="select2-data-10-8eap">Giờ giất làm việc</option>
                                                <option value="Inactive">Quy trình làm việc</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nhập điểm cộng/trừ</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+ <span style="color:#f43b48">&</span>-</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Cú pháp cộng [2] & Nếu trừ cú pháp [-2]">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Cộng trừ KPI</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Ghi chú <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"> 
                                        <label>Photo</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Chấm KPI</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

            <!-- Add Training Type Modal -->
            <div id="add_type" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('form/training/type/save') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="type" name="type">
                                </div>
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="2" id="description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select class="select" id="status" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Training Type Modal -->
            
            <!-- Edit Training Type Modal -->
            <div id="edit_type" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('form//training/type/update') }}" method="POST">
                                @csrf
                                <input type="hidden" class="form-control" id="e_id" name="id" value="">
                                <div class="form-group">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="e_type" name="type" value="">
                                </div>
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="2" id="e_description" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select class="select" id="e_status" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Training Type Modal -->
            
            <!-- Delete Training Type Modal -->
            <div class="modal custom-modal fade" id="delete_type" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Training Type</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <form action="{{ route('form//training/type/delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" class="e_id" value="">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Training Type Modal -->
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    @section('script')
        {{-- update --}}
        <script>
            $(document).on('click','.edit_type',function()
            {
                var _this = $(this).parents('tr');
                $('#e_id').val(_this.find('.e_id').text());
                $('#e_type').val(_this.find('.type').text());
                $('#e_description').val(_this.find('.description').text());
                
                // status
                var status = (_this.find(".status").text());
                var _option = '<option selected value="' +status+ '">' + _this.find('.status').text() + '</option>'
                $( _option).appendTo("#e_status");
            });
            
        </script>
        {{-- delete model --}}
        <script>
            $(document).on('click','.delete_type',function()
            {
                var _this = $(this).parents('tr');
                $('.e_id').val(_this.find('.e_id').text());
            });
        </script>
    @endsection
@endsection
