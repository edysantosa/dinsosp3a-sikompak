@extends('layouts.main')


@section('contentheader')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Add user</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Horizontal Form -->
            <div class="card">
                <!-- form start -->
                <form id="user-create-form" class="form-horizontal" action="{{ route('admin.users.store') }}" method="post">
                    @include('admin.users.partials.form', ['create' => true])
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="{{ asset('dist/js/user-create.js') }}"></script>
@stop