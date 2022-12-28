@extends('layouts.main')


@section('contentheader')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>PMKS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Pendataan PMKS</a></li>
                    <li class="breadcrumb-item active">Tabel PMKS</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Search card -->
            <form id="form-search" class="form-horizontal" action="{{ route('pmks.index') }}" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pencarian</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" id="nama-search" name="nama" placeholder="Nama PMKS">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIK</label>
                                    <input type="text" class="form-control" id="nik-search" name="nik" placeholder="Nomor Induk Kependudukan">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kabupaten</label>
                                    <select class="form-control select2" name="kabupaten[]" multiple="multiple" data-placeholder="Pilih Kabupaten/Kota" style="width: 100%;">
                                        @foreach($kabupaten as $kab)
                                            <option value="{{ $kab->id }}">
                                                {{ $kab->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis PMKS</label>
                                    <select class="form-control select2" name="jenis-pmks[]" multiple="multiple" data-placeholder="Pilih Jenis PMKS" style="width: 100%;">
                                        @foreach($jenis_pmks as $jpmks)
                                            <option value="{{ $jpmks->id }}">
                                                {{ $jpmks->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-sm btn-default" id="btn-search-undo"><i class="fa fa-undo"></i> Batalkan</button>
                        <button type="button" class="btn btn-sm btn-primary" id="btn-search"><i class="fa fa-search"></i> Cari</button>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </form>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-app bg-primary">
                            <i class="fas fa-user-plus"></i> Tambah PMKS
                        </a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped dt-responsive yajra-datatable w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kabupaten Asal</th>
                                <th>Alamat</th>
                                <th>Jenis Pmks</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="{{ asset('dist/js/pmks.js') }}"></script>
@stop