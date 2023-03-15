@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">
            <a href="{{ route('form/job/list') }}" class="btn btn-primary apply-btn">Công việc</a>
            <div class="container">
                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="{{ URL::to('assets/img/toyota-thap-nhat-phong-vinh-long.jpg') }}" alt="Toyota Thập Nhất Phong Vĩnh Long"></a>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <!-- /Account Logo -->
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Đăng nhập</h3>
                        <p class="account-subtitle">Truy cập vào trang chủ</p>
                        <!-- Account Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Nhập tên đăng nhập">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Mật khẩu</label>
                                    </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Nhập mật khẩu">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label></label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="{{ route('forget-password') }}">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Đăng nhập</button>
                            </div>
                            <div class="account-footer">
                                <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
                            </div>
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
