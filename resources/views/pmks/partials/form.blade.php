@csrf
<div class="card-body">

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="pmks-nik" name="nik" placeholder="NIK" maxlength="16" 
                value="{{old('nik') ?? $pmks->nik ?? ""}}">

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
                <input type="text" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="pmks-kartu-keluarga" name="kartu_keluarga" placeholder="No. Kartu Keluarga"  maxlength="16" 
                value="{{old('kartu_keluarga') ?? $pmks->kartu_keluarga ?? ""}}">

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
                <input type="text" class="form-control @error('bpjs_kesehatan') is-invalid @enderror" id="pmks-bpjs-kesehatan" name="bpjs_kesehatan" placeholder="No. BPJS/KIS"  maxlength="13" 
                value="{{old('bpjs_kesehatan') ?? $pmks->bpjs_kesehatan ?? ""}}">

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
                    <input type="checkbox" class="form-check-input" id="pmks-kis">
                    <label class="form-check-label" for="pmks-kis">Pemegang Kartu Indonesia Sehat</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="pmks-nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="pmks-nama" name="nama" placeholder="Nama PMKS" maxlength="100" 
            value="{{old('nama') ?? $pmks->nama ?? ""}}">

            @error('nama')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="student-jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="1" {{old('jenis_kelamin', 1) == 1 ? 'checked=""' : ""}}>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="2" {{old('jenis_kelamin') == 2 ? 'checked=""' : ""}}>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>

            @error('jenis_kelamin')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="pmks-tempat-lahir" class="col-sm-2 col-form-label">Tempat/Tgl. Lahir</label>
        <div class="col-sm-3">
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="pmks-tempat-lahir" name="tempat-lahir" placeholder="Tempat Lahir" maxlength="100" 
            value="{{old('tempat_lahir') ?? $pmks->tempat_lahir ?? ""}}">

            @error('tempat_lahir')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-sm-2">
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

    <div class="form-group row">
        <label for="pmks-alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="pmks-alamat" name="alamat" rows="3" placeholder="Alamat">{{old('alamat') ?? $pmks->alamat ?? ""}}</textarea>

            @error('alamat')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2 offset-sm-2">
            <div class="form-group">
                <label>Provinsi</label>
                <select class="form-control select2  @error('provinsi_id') is-invalid @enderror" id="pmks-provinsi" name="provinsi" autocomplete="off">
                    @php
                        $selProv = old('provinsi_id') ?? $pmks->provinsi_id ?? 51;
                    @endphp
                    @foreach ($provinsi as $prov)
                        <option value="{{ $prov->id }}" {!! $selProv == $prov->id ? 'selected="selected"' : "" !!}>{{ $prov->nama }}</option>
                    @endforeach
                </select>

                @error('provinsi_id')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>Kabupaten/Kota <i id="kabupaten-loader" class="fas fa-spin fa-spinner"  style="display:none;"></i></label>
                <select class="form-control select2  @error('kabupaten_kota_id') is-invalid @enderror" id="pmks-kabupaten" name="kabupaten" autocomplete="off">
                    @php
                        $selKab = old('kabupaten_kota_id') ?? $pmks->kabupaten_kota_id ?? '51.71';
                    @endphp
                    @foreach ($kabupaten as $kab)
                        <option value="{{ $kab->id }}" {!! $selKab == $kab->id ? 'selected="selected"' : "" !!}>{{ $kab->nama }}</option>
                    @endforeach
                </select>

                @error('kabupaten_kota_id')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Kecamatan <i id="kecamatan-loader" class="fas fa-spin fa-spinner"  style="display:none;"></i></label>
                <select class="form-control select2  @error('kecamatan_id') is-invalid @enderror" id="pmks-kecamatan" name="kecamatan" autocomplete="off">
                    @php
                        $selKec = old('kecamatan_id') ?? $pmks->kecamatan_id ?? '51.71.02';
                    @endphp
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id }}" {!! $selKec == $kec->id ? 'selected="selected"' : "" !!}>{{ $kec->nama }}</option>
                    @endforeach
                </select>

                @error('kecamatan_id')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Kelurahan <i id="kelurahan-loader" class="fas fa-spin fa-spinner"  style="display:none;"></i></label>
                <select class="form-control select2  @error('kelurahan_id') is-invalid @enderror" id="pmks-kelurahan" name="kelurahan" autocomplete="off">
                    @php
                        $selKel = old('kelurahan_id') ?? $pmks->kelurahan_id ?? '51.71.02.2001';
                    @endphp
                    @foreach ($kelurahan as $kel)
                        <option value="{{ $kel->id }}" {!! $selKel == $kel->id ? 'selected="selected"' : "" !!}>{{ $kel->nama }}</option>
                    @endforeach
                </select>

                @error('kelurahan_id')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
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