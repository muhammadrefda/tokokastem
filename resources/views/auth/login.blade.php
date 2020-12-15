@extends('layouts.app')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('img/img-01.png')}}" alt="">
            </div>
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-title">
						Login
					</span>

                <div class="wrap-input100">
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}"
                           placeholder="email" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100">
                    <input id="password" class="input100 @error('password') is-invalid @enderror" type="password"
                           name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ __('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
