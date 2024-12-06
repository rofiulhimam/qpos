@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/page/login.css') }}" />
@endpush

@section('title')
Login
@endsection

@section('content')
{{-- <div class="container">
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
</div> --}}

<div class="login">
    <div class="login1">
        <div class="logo-vertical">
            <img class="logo-icon" alt="logo" src="{{ asset('assets/image/logo.png') }}" />
            <b class="text-logo">Q-POS</b>
        </div>
        <div class="form-login">
            <div class="title">Selamat Datang Kembali!</div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form">
                    <div class="email">
                        <div class="form-title">E-mail</div>
                        <div class="field">
                            <input class="placeholder @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Masukkan email anda" required value="{{ old('email') }}"/>
                        </div>
                        {{-- *siapin elemen buat munculin error, kalo udah code di bawah tinggal uncomment aja --}}
                        {{-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="email">
                        <div class="form-title">Password</div>
                        <div class="field">
                            <input class="placeholder @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Masukkan password anda" required/>
                            <img class="icon-eye-off" alt="" src="{{ asset('assets/image/icon eye-off.svg') }}" />
                        </div>
                        {{-- *siapin elemen buat munculin error, kalo udah code di bawah tinggal uncomment aja --}}
                        {{-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>
                <div class="button-login" id="buttonLoginContainer">
                    <input class="label" type="submit" value="Masuk"></input>
                </div>
            </form>
            <div class="help-text">
                <div class="text">Belum punya akun?</div>
                <a href="{{ route('register') }}"><div class="label2" id="lABELText1">Daftar</div></a>
            </div>
        </div>
    </div>
</div>
@endsection
