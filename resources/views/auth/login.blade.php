@extends('auth.layouts.main')

@section('content')
<!-- /.login-logo -->
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="{{url('/')}}" class="h1"><b>Sikompak</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sistem Komunikasi Provinsi dan Kabupaten/Kota</p>
        @include('partials.alerts')
        @include('partials.errors')
        <form id="login-form" action="{{ route('auth.login.store') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
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
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            Ingat Saya
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <p class="mb-1">
            <a href="{{ route('auth.forgot.index') }}">Saya lupa kata sandi</a>
        </p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection