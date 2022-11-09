@extends('auth.layouts.main')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sistem Komunikasi Provinsi dan Kabupaten/Kota</p>
        @include('partials.alerts')
        @include('partials.errors')
        <form id="login-form" action="{{ route('password.reset') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>

                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"  name="password_confirmation" placeholder="Password Confirmation">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Ubah kata sandi</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{ route('auth.login.index') }}">Login</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection