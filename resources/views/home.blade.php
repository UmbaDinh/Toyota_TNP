@extends('layouts.nguoidung')


@push('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/custom-datatables.css') }}"> --}}
@endpush

@push('script')
    <script src="{{ asset('admin/assets/js/trangchu.js') }}"></script>
@endpush


@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                  <h4 class="card-title">Thông báo</h4>
                  {{-- <p class="card-description">Add class <code>.btn-icon</code> for buttons with only icons</p> --}}
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr class="table-info">
                            <th>
                                <p class="card-description">Thông báo 1</p>
                            </th>
                            <th  style="text-align: right">
                                <a href="" class="btn btn-rounded btn-primary btn-sm">Dowload thông báo</a>
                            </th>
                        </tr>
                        <tr class="table-primary">
                            <th>
                                <p class="card-description">Thông báo 2</p>
                            </th>
                            <th  style="text-align: right">
                                <a href="" class="btn btn-rounded btn-primary btn-sm">Dowload thông báo</a>
                            </th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>  
              </div>
            </div>
          </div>


          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Top 10 Nhân viên xuất sắc tháng 2</h4>
                <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr class="table-info">
                            <th>
                                <p class="card-description">Top 1</p>
                            </th>
                            <th>
                                <img src="{{ asset('admin/images/auth/bg_1.jpg') }}" alt="Image" width="50px" height="50px">
                            </th>
                            <th>
                                <p class="card-description">Nguyễn Văn A</p>
                            </th>
                            <th>
                                <p class="card-description">Cố vấn dịch vụ</p>
                            </th>
                        </tr>
                        <tr class="table-warning">
                            <th>
                                <p class="card-description">Top 2</p>
                            </th>
                            <th>
                                <img src="{{ asset('admin/images/auth/bg_1.jpg') }}" alt="Image" width="50px" height="50px">
                            </th>
                            <th>
                                <p class="card-description">Nguyễn Văn A</p>
                            </th>
                            <th>
                                <p class="card-description">Cố vấn dịch vụ</p>
                            </th>
                        </tr>
                        <tr class="table-danger">
                            <th>
                                <p class="card-description">Top 3</p>
                            </th>
                            <th>
                                <img src="{{ asset('admin/images/auth/bg_1.jpg') }}" alt="Image" width="50px" height="50px">
                            </th>
                            <th>
                                <p class="card-description">Nguyễn Văn A</p>
                            </th>
                            <th>
                                <p class="card-description">Cố vấn dịch vụ</p>
                            </th>
                        </tr>
                        <tr class="table-success">
                            <th>
                                <p class="card-description">Top 4</p>
                            </th>
                            <th>
                                <img src="{{ asset('admin/images/auth/bg_1.jpg') }}" alt="Image" width="50px" height="50px">
                            </th>
                            <th>
                                <p class="card-description">Nguyễn Văn A</p>
                            </th>
                            <th>
                                <p class="card-description">Cố vấn dịch vụ</p>
                            </th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </div>
</div>



@endsection
