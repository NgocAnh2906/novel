@extends('layouts.app')

@section('content')
<div class="limiter">
      <div
        class="container-login100"
        style="background-image: url('/css/images/bg-01.jpg')"
      >
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
          <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
            <span class="login100-form-title p-b-49"> Đăng ký </span>

            <div
              class="wrap-input100 validate-input m-b-23"
            >
              <span class="label-input100">Name</span>
              <input
                class="input100 @error('name') is-invalid @enderror"
                type="text"
                id="name"
                name="name"
                placeholder="Nhập name của bạn"
                required
                value="{{ old('name') }}"
              />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

             <div
              class="wrap-input100 validate-input m-b-23"
            >
              <span class="label-input100">Email</span>
              <input
                class="input100 @error('email') is-invalid @enderror"
                type="text"
                id="email"
                name="email"
                required
                placeholder="Nhập email của bạn"
                value="{{ old('email') }}"
              />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div
              class="wrap-input100 validate-input"
            >
              <span class="label-input100">Mật khẩu</span>
              <input
                class="input100 @error('password') is-invalid @enderror"
                type="password"
                name="password"
                required
                placeholder="Nhập mật khẩu của bạn"
              />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div
              class="wrap-input100 validate-input"
            >
              <span class="label-input100">Confirm Password</span>
              <input
                class="input100 @error('password-confirm') is-invalid @enderror"
                type="password"
                id="password-confirm"
                name="password_confirmation"
                required
                placeholder="Nhập lại mật khẩu"
              />
                @error('password-confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="container-login100-form-btn mt-3">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">Đăng ký</button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection
