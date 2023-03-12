@extends('layouts.app')

@section('content')
    <div class="container content1 justify-content-center">
        <div class="row justify-content-center login">
        <a style="display: block; text-align: center; font-size: 30px; font-weight: bold; color: white;">Sign In</a>
            <div class="col-md-4">
                <!-- <div class="card"> -->
                    <!-- <div class="card-header">{{ __('Login') }}</div> -->
                    <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a> -->
                    <div class="card-body d-flex flex-column align-items-center">
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 input-field">
                                <!-- <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                                <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email"
                                    class="input form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required oninvalid="this.setCustomValidity('')" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <script>
                                        var emailInput = document.getElementById('email');
                                        emailInput.addEventListener('invalid', function(event) {
                                            if (emailInput.value === '') {
                                                event.target.setCustomValidity('Silahkan Isi Email Anda');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="row mb-3 input-field">
                                <!-- <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Password"
                                        class=" input form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3  rememb">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label warna" stylefor="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn-login">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-0 forgot">
                                <div class="col-md-12">
                                @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white forgot" href="{{ route('password.request') }}">
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
    </div>
@endsection
