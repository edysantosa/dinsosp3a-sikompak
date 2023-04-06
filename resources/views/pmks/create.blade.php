@extends('layouts.main')


@section('contentheader')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah PMKS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sikompak</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">PMKS</a></li>
                    <li class="breadcrumb-item active">Tambah PMKS</li>
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

            <!-- form start -->
            <form id="pmks-create-form" class="form-horizontal" action="{{ route('pmks.store') }}" method="post" autocomplete="off">
                @include('pmks.partials.form', ['create' => true])
            </form>

        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="{{ mix('/js/pmks-create.js', 'dist') }}"></script>
@stop