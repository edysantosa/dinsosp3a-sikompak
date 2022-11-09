@extends('layouts.main')


@section('contentheader')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My User Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{ auth()->user()->getFirstMediaUrl('profile', 'thumb') }}"
                        alt="User profile picture" role="button">

                        <form id="image-form" action="{{ route('user.profile.store') }}" method="post">
                            @csrf
                            <input type="file" id="image" name="image" style="display:none">
                        </form>
                    </div>
                    <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                    <p class="text-muted text-center">{{ auth()->user()->roles->pluck('name')->implode(', ') }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @include('partials.alerts')
            @include('partials.errors')
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="edit-profile" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile-content" role="tab" aria-controls="profile-content" aria-selected="true">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password-content" role="tab" aria-controls="password" aria-selected="false">Update Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="edit-profileContent">
                        <div class="tab-pane fade show active" id="profile-content" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="profile-form form-horizontal" action="{{ route('user.profile.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="user-name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="user-name" name="name" placeholder="Nama" 
                                        value="{{old('name') ?? auth()->user()->name ?? ""}}">

                                        @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user-email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="user-email" name="email" placeholder="Email"
                                        value="{{old('email') ?? auth()->user()->email ?? ""}}">

                                        @error('email')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="password-content" role="tabpanel" aria-labelledby="password-tab">
                            <form class="profile-form form-horizontal" action="{{ route('user.profile.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="user-password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">

                                        @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user-password" class="col-sm-2 col-form-label">Password Confirmation</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Password">

                                        @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary float-right">Ubah kata sandi</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('pagescript')
<script src="{{ asset('dist/js/profile.js') }}"></script>
@stop