@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/page/register.css') }}" />
@endpush

@section('title')
Register
@endsection

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="daftar">
    <div class="register">
        <div class="logo-horizontal">
            <img class="logo-icon" alt="" src="{{ asset('assets/image/Logo.png') }}" />
            <b class="text">Q-POS</b>
        </div>
        <div class="form-register">
            <div class="title">Daftar Akun</div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form">
                    <div class="nama-lengkap">
                        <div class="form-title">
                            <div class="form-title1">Nama Lengkap</div>
                        </div>
                        <div class="field">
                            <input class="placeholder @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Masukkan nama anda" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                        </div>
                    </div>
                    <div class="nama-lengkap">
                        <div class="form-title">
                            <div class="form-title1">E-mail</div>
                        </div>
                        <div class="field">
                            <input class="placeholder @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Masukkan email anda" value="{{ old('email') }}" required autocomplete="email"/>
                        </div>
                    </div>
                    <div class="nama-lengkap">
                        <div class="form-title">
                            <div class="form-title1">Password</div>
                        </div>
                        <div class="field">
                            <input class="placeholder @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Masukkan password anda" required autocomplete="new-password"/>
                            <img class="icon-eye-off" alt="" src="{{ asset('assets/image/icon eye-off.svg') }}" />
                        </div>
                        <div class="form-help-text">
                            <div class="form-help-text1">
                                Harus mengandung minimal 8 karakter
                            </div>
                        </div>
                    </div>
                    <div class="nama-lengkap">
                        <div class="form-title">
                            <div class="form-title1">Konfirmasi Password</div>
                        </div>
                        <div class="field">
                            <input class="placeholder" id="password-confirm" name="password_confirmation" type="password" placeholder="Masukkan lagi password anda" required autocomplete="new-password"/>
                            <img class="icon-eye-off" alt="" src="{{ asset('assets/image/icon eye-off.svg') }}" />
                        </div>
                    </div>
                </div>
                <div class="button" id="buttonContainer">
                    <div class="label"><input type="submit" value="Daftar"></div>
                </div>
            </form>
            <div class="help-text">
                <div class="text2">Sudah punya akun?</div>
                <a href="{{ route('login') }}"><div class="label2" id="lABELText1">Masuk</div></a>
            </div>
        </div>
    </div>
</div>
@endsection
