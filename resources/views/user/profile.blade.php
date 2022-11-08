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
                        src="../../dist/img/user4-128x128.jpg"
                        alt="User profile picture">
                        <form id="image-form" action="{{ route('user.profile.store') }}" method="post">
                            @csrf
                            <input type="file" id="image" name="image" style="display:none">
                        </form>
                    </div>

                    <h3 class="profile-username text-center">Nina Mcintire</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                            <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profle" role="tab" aria-controls="profle" aria-selected="true">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">Update Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="edit-profileContent">
                        <div class="tab-pane fade show active" id="profle" role="tabpanel" aria-labelledby="profile-tab">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <form id="profile-form" class="form-horizontal" action="{{ route('user.profile.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="user-password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="user-password" name="password" placeholder="Password">

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