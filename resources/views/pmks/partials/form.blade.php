@csrf
<div class="card-body">

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="user-nik" name="nik" placeholder="NIK" maxlength="16" 
                value="{{old('nik') ?? $user->nik ?? ""}}">

                @error('nik')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>No. KK</label>
                <input type="text" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="user-kartu-keluarga" name="kartu_keluarga" placeholder="No. Kartu Keluarga"  maxlength="16" 
                value="{{old('kartu_keluarga') ?? $user->kartu_keluarga ?? ""}}">

                @error('kartu_keluarga')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>No. BPJS/KIS</label>
                <input type="text" class="form-control @error('bpjs_kesehatan') is-invalid @enderror" id="user-bpjs-kesehatan" name="bpjs_kesehatan" placeholder="No. BPJS/KIS"  maxlength="13" 
                value="{{old('bpjs_kesehatan') ?? $user->bpjs_kesehatan ?? ""}}">

                @error('bpjs_kesehatan')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>KIS</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="user-kis">
                    <label class="form-check-label" for="user-kis">Pemegang Kartu Indonesia Sehat</label>
                </div>
            </div>
        </div>
    </div>




    <div class="form-group row">
        <label for="user-nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="user-nama" name="nama" placeholder="Nama PMKS" 
            value="{{old('nama') ?? $user->nama ?? ""}}">

            @error('nama')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="student-sex" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" value="1" {{old('sex', 1) == 1 ? 'checked=""' : ""}}>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" value="2" {{old('sex') == 2 ? 'checked=""' : ""}}>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>

            @error('sex')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user-tempat-lahir" class="col-sm-2 col-form-label">Tempat/Tgl. Lahir</label>
        <div class="col-sm-3">
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="user-tempat-lahir" name="tempat-lahir" placeholder="Tempat Lahir" 
            value="{{old('tempat_lahir') ?? $user->tempat_lahir ?? ""}}">

            @error('tempat_lahir')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-sm-3">
            <div class="input-group date" id="tanggal-lahir" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#tanggal-lahir" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" class="form-control datetimepicker-input @error('class') is-invalid @enderror" data-target="#tanggal-lahir" data-toggle="datetimepicker" id="student-tanggal-lahir" name="tanggal-lahir" placeholder="Tanggal Lahir" data-old="{{old('tanggal_lahir') ?? $student->tanggal_lahir ?? ""}}">
            </div>

            @error('tanggal_lahir')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>


    @isset($create)
        {{-- Kalau mode buat baru disini ya --}}
    @endisset
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary float-right">Simpan</button>
</div>
<!-- /.card-footer -->