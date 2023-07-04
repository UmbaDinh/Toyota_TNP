@extends('layouts.login_master')

@section('content')
    <section>
      <div class="color"></div>
      <div class="color"></div>
      <div class="color"></div>
      <div class="box" style="background: rgb(223 179 179)">
        <div class="square" style="--i:0;"></div>
        <div class="square" style="--i:1;"></div>
        <div class="square" style="--i:2;"></div>
        <div class="square" style="--i:3;"></div>
        <div class="square" style="--i:4;"></div>
        <div class="container">
          <div class="form">
            <h2>Đăng nhập</h2>
            <h2>Toyota Thập Nhất Phong</h2>
            <form method="POST" action="{{ route('login') }}">
              @csrf
                <div class="inputBox" >
                  <input type="text" placeholder="Tên đăng nhập"  name="email" style="background: rgb(200 140 140)" >
                </div>
                <div class="inputBox">
                  <input type="password" placeholder="Mật khẩu"  name="password" style="background:  rgb(200 140 140)">
                </div>
                <div class="inputBox">
                  <input type="submit"  id="btn" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
