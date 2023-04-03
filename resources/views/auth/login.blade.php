@extends('layouts.welcome')

@section('content')
    <section>
      <div class="container">
        <div id="scene">
          <div class="layer" data-depth-x="-0.5" data-depth-y="0.25"><img src="{{ asset('asset_login/img/moon.png') }}"></div>
          <div class="layer" data-depth-x="0.15"><img src="{{ asset('asset_login/img/mountains02.png') }}"></div>
          <div class="layer" data-depth-x="0.25"><img src="{{ asset('asset_login/img/mountains01.png') }}"></div>
          <div class="layer" data-depth-x="-0.25"><img src="{{ asset('asset_login/img/road.png') }}"></div>
        </div>
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login">
          <h2 style="color: #2c3c99">Đăng nhập</h2>
          <h3 style="color: #2c3c99">Toyota <br>Thập Nhất Phong</h3>
          <div class="inputBox">
            <input type="text" placeholder="Tên đăng nhập"  name="email">
          </div>
          <div class="inputBox">
            <input type="password" placeholder="Mật khẩu"  name="password">
          </div>
          <div class="inputBox">
            <button type="submit"  id="btn" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
              {{ __('Login') }}
            </button>
          </div>
        </div>
      </form>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js" integrity="sha512-/6TZODGjYL7M8qb7P6SflJB/nTGE79ed1RfJk3dfm/Ib6JwCT4+tOfrrseEHhxkIhwG8jCl+io6eaiWLS/UX1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      let scene = document.getElementById('scene');
      let parallax = new Parallax(scene);
    </script>
@endsection
