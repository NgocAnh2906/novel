@extends('layouts.app')

@section('content')
<div class="limiter">
      <div
        class="container-login100"
        style="background-image: url('/css/images/bg-01.jpg')"
      >
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
          <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
            <span class="login100-form-title p-b-49"> Đăng nhập </span>

            <div
              class="wrap-input100 validate-input m-b-23"
              data-validate="Email không được bỏ trống"
            >
              <span class="label-input100">Email</span>
              <input
                class="input100"
                type="text"
                id="email"
                name="email"
                placeholder="Nhập email của bạn"
                value="{{ old('email') }}"
              />
              <span class="focus-input100">
                <i class="fa-solid fa-envelope"></i>
              </span>
            </div>

            <div
              class="wrap-input100 validate-input"
              data-validate="Mật khẩu không được bỏ trống"
            >
              <span class="label-input100">Mật khẩu</span>
              <input
                class="input100"
                type="password"
                name="password"
                placeholder="Nhập mật khẩu của bạn"
              />
              <i class="fa-solid fa-lock"></i>
              <span class="focus-input100">
              </span>
            </div>

            <div class="text-right p-t-8 p-b-31">
              <a href="{{ route('password.request') }}"> Quên mật khẩu </a>
            </div>

            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="submit">Đăng nhập</button>
              </div>
            </div>

             <div class="container-login100-form-btn mt-3">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <a href="{{ route('register') }}" class="login100-form-btn" >Đăng ký</a>
              </div>
            </div>

          </form>
        </div>
      </div>
  
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
