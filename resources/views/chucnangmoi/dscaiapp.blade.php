
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
                        <h3 class="page-title">DS Cài APP</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item active">DS Cài APP</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_training"><i class="fa fa-plus"></i> Add New </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-md-4">
                    <h3>Tìm KH</h3>
                    <form action="search.html">
                        <input class="form-control" type="text" placeholder="Nhập tên Khách hàng">
                        <button class="btn" type="submit">
                        </button>
                    </form>
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
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                                <a class="dropdown-item delete_training" href="#" data-toggle="modal" data-target="#delete_training"><i class="fa fa-trash-o m-r-5"></i> Xem chi tiếc</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Thông tin</h3>
                    <form action="http://127.0.0.1:8000/form/training/save" method="POST">
                        <input type="hidden" name="_token" value="Zv1GTFMzr7LNbAAMfV8zs6K2mGTyH4xywx0kOSD9">                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tên KH<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="training_cost">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Biển số xe <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="training_cost">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ngày & Giờ<span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker " type="text" name="end_date">
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
                                <div class="form-group">
                                    <label class="col-form-label">Trạng thái</label>
                                    <select class="select select2-hidden-accessible" name="status" data-select2-id="select2-data-8-xdso" tabindex="-1" aria-hidden="true">
                                        <option value="Active" data-select2-id="select2-data-10-8eap">Đã cài App</option>
                                        <option value="Inactive">Chưa Cài App</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add Training List Modal -->
        <div id="add_training" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Training</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/training/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Type</label>
                                        <select class="select" name="training_type" @error('training_type') is-invalid @enderror>
                                            <option selected disabled>-- Select --</option>
                                            <option value="Node Training">Node Training</option>
                                            <option value="Swift Training">Swift Training</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Trainer</label>
                                        <select class="select" id="trainer" name="trainer" @error('trainer') is-invalid @enderror>
                                            @foreach ($user as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-trainer_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="trainer_id" name="trainer_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employees</label>
                                        <select class="select" id="employees" name="employees" @error('employees') is-invalid @enderror>
                                            @foreach ($user as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-employees_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="employees_id" name="employees_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="training_cost" @error('training_cost') is-invalid @enderror>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('start_date') is-invalid @enderror" type="text" name="start_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('end_date') is-invalid @enderror" type="text" name="end_date">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3"name="description" @error('description') is-invalid @enderror></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" name="status" @error('status') is-invalid @enderror>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Training List Modal -->
        
        <!-- Edit Training List Modal -->
        <div id="edit_training" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Training List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/training/update') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" id="e_id" name="id" value="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Type</label>
                                        <select class="select" id="e_training_type" name="training_type">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Node Training">Node Training</option>
                                            <option value="Swift Training">Swift Training</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Trainer</label>
                                        <select class="select" id="e_trainer" name="trainer">
                                            @foreach ($user as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-e_trainer_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="e_trainer_id" name="trainer_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Employees</label>
                                        <select class="select" id="e_employees" name="employees">
                                            @foreach ($user as $items )
                                                <option selected disabled>-- Select --</option>
                                                <option value="{{ $items->name }}" data-e_employees_id={{ $items->user_id }}>{{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="e_employees_id" name="employees_id" readonly>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Training Cost <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="e_training_cost" name="training_cost" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="e_start_date" name="start_date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="e_end_date" name="end_date" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="e_description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="select" id="e_status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Training List Modal -->
        
        <!-- Delete Training List Modal -->
        <div class="modal custom-modal fade" id="delete_training" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Training List</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/training/delete') }}" method="POST">
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
        <!-- /Delete Training List Modal -->
    
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        // select auto id and email
        $('#trainer').on('change',function()
        {
            $('#trainer_id').val($(this).find(':selected').data('trainer_id'));
        });
        $('#employees').on('change',function()
        {
            $('#employees_id').val($(this).find(':selected').data('employees_id'));
        });
    </script>
    <script>
        // select auto id and email
        $('#e_trainer').on('change',function()
        {
            $('#e_trainer_id').val($(this).find(':selected').data('e_trainer_id'));
        });
        $('#e_employees').on('change',function()
        {
            $('#e_employees_id').val($(this).find(':selected').data('e_employees_id'));
        });
    </script>

    {{-- update js --}}
    <script>
        $(document).on('click','.edit_training',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.e_id').text());
            $('#e_trainer_id').val(_this.find('.trainer_id').text());
            $('#e_employees_id').val(_this.find('.employees_id').text());
            $('#e_training_cost').val(_this.find('.training_cost').text());
            $('#e_start_date').val(_this.find('.start_date').text());  
            $('#e_end_date').val(_this.find('.end_date').text());  
            $('#e_description').val(_this.find('.description').text());

            // training_type
            var training_type = (_this.find(".training_type").text());
            var _option = '<option selected value="' +training_type+ '">' + _this.find('.training_type').text() + '</option>'
            $( _option).appendTo("#e_training_type");

            // trainer
            var trainer = (_this.find(".trainer").text());
            var _option = '<option selected value="' +trainer+ '">' + _this.find('.trainer').text() + '</option>'
            $( _option).appendTo("#e_trainer");

            // employees
            var employees = (_this.find(".employees").text());
            var _option = '<option selected value="' +employees+ '">' + _this.find('.employees').text() + '</option>'
            $( _option).appendTo("#e_employees");

            // status
            var status = (_this.find(".status").text());
            var _option = '<option selected value="' +status+ '">' + _this.find('.status').text() + '</option>'
            $( _option).appendTo("#e_status");
        });
    </script>

    {{-- delete model --}}
    <script>
        $(document).on('click','.delete_training',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
    @endsection
@endsection
