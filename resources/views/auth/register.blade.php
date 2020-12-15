@extends('layouts.app')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('img/img-01.png')}}" alt="">
                </div>
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
						Register
					</span>

                    <div class="wrap-input100">
                        <input class="input100 @error('name') is-invalid @enderror" id="name" type="text" name="name"
                               value="{{ old('name') }}" placeholder="name" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="symbol-input100">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100 @error('email') is-invalid @enderror" id="email" type="email"
                               name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email"
                               autofocus>
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
                        <input class="input100 @error('phone_number') is-invalid @enderror" type="number"
                               name="phone_number" placeholder="Nomor Telepon" required>
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100 @error('address') is-invalid @enderror" type="text" name="address"
                               placeholder="Alamat Lengkap" required>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="symbol-input100">
							<i class="fa fa-address-book" aria-hidden="true"></i>
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

                    <div class="wrap-input100">
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password"
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Konfirmasi Password">
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
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
