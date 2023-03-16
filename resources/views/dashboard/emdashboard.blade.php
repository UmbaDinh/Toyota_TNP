@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="welcome-box">
                        <div class="welcome-img">
                            <img src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="welcome-det">
                            <h3>Chào mừng, {{ Auth::user()->name }} đã trở lại!!!</h3>
                            <p>{{ $todayDate }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <section class="dash-section">
                        <h1 class="dash-sec-title">Thông báo cá nhân</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <a href="#" class="dash-card text-danger">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-hourglass-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Bạn xin nghỉ vào thứ 2 - 13/03/2023</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/toyota-thap-nhat-phong-vinh-long.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="#" class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Bạn bị trừ điểm đi trể - 16/03/2023</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/toyota-thap-nhat-phong-vinh-long.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="#" class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Hôm nay bạn làm việc ở nhà</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/toyota-thap-nhat-phong-vinh-long.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </section>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="dash-sidebar">
                        <section>
                            <h5 class="dash-title">KPI</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>71</h4>
                                            <p>Điểm hiện tại</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>14</h4>
                                            <p>Số lần bị trừ điểm</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <div class="dash-stats-list">
                                            <h4>2</h4>
                                            <p>Tháng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Nghỉ phép</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>4</h4>
                                            <p>Số lần nghỉ</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>1</h4>
                                            <p>Còn lại</p>
                                        </div>
                                    </div>
                                    {{-- <div class="request-btn">
                                        <a class="btn btn-primary" href="#">Apply Leave</a>
                                    </div> --}}
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Kỳ nghỉ sắp tới</h5>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="holiday-title mb-0">30 tháng 4 - 1 tháng 5</h4>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->  
@endsection