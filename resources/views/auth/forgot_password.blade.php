@extends('auth.layouts.main')

@section('content')
<!-- /.login-logo -->
<div class="card card-outline card-primary">
    <div class="card-body">
        <p class="login-box-msg">Masukkan email yang terdaftar, apabila ditemukan kami akan mengirim email untuk mengatur ulang kata sandi anda.</p>
        @include('partials.alerts')
        @include('partials.errors')                
        <form id="login-form" action="{{ route('auth.forgot.store') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" @if (session('info')) disabled @endif>
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
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block" @if (session('info')) disabled @endif>Minta password baru</button>
                </div>
            </div>
        </form>
        <p class="mt-3 mb-1">
            <a href="{{ route('auth.login.index') }}">Login</a>
        </p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection