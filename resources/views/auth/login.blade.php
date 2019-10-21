@extends('layouts.default')

@section('title', __('Login'))

@section('body-class', 'login-page')

@section('page')
<!-- Login box -->
<div class="login-box">
    <!-- Login logo -->
    <div class="login-logo">
        <a href="{{ url('/') }}">{{ __('DBNav') }}</a>
    </div>

    <!-- Login card -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Login') }}</p>

            @include('shared.alert')
            
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="{{ __('Username') }}" value="{{ old('username') }}" required autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('shared.footer')

@endsection

@push('styles')
<style>
    .login-page {
        height: 70vh;
    }
    .main-footer {
        margin-left: 0 !important;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 55px;
    }
</style>
@endpush