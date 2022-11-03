@extends('layouts.main')


@section('contentheader')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped dt-responsive yajra-datatable w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-50">Nama</th>
                        <th class="w-50">Email</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
        <div class="card-footer">
                <a href="{{ route('admin.users.create') }}" class="btn btn-app bg-info">
                    <i class="fas fa-user-plus"></i> Tambah User
                </a>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="{{ asset('dist/js/users.js') }}"></script>
@stop