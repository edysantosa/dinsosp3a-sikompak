@csrf
<div class="card">
    <div class="card-body">
        @include('partials.alerts')
        @include('partials.errors')
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
            <label class="col-sm-2 col-form-label">Jenis kelamin</label>
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
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="pmks-tempat-lahir" name="tempat_lahir" placeholder="Tempat Lahir" maxlength="100" 
                value="{{old('tempat_lahir') ?? $pmks->tempat_lahir ?? ""}}">

                @error('tempat_lahir')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="col-sm-2">
                <div class="input-group date @error('tanggal_lahir') is-invalid @enderror" id="tanggal-lahir" data-target-input="nearest">
                    <div class="input-group-prepend" data-target="#tanggal-lahir" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input @error('tanggal_lahir') is-invalid @enderror" data-target="#tanggal-lahir" data-toggle="datetimepicker" id="pmks-tanggal-lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" data-old="{{old('tanggal_lahir') ?? $pmks->tanggal_lahir ?? ""}}">
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
                    <select class="form-control select2 select-address @error('provinsi_id') is-invalid @enderror" id="pmks-provinsi" name="provinsi_id" data-old="{{old('provinsi_id') ?? $pmks->provinsi_id ?? ""}}">
                        {{-- @php
                            $selProv = old('provinsi_id') ?? $pmks->provinsi_id ?? 51;
                        @endphp --}}
                        @foreach ($provinsi as $prov)
                            {{-- <option value="{{ $prov->id }}" {!! $selProv == $prov->id ? 'selected="selected"' : "" !!}>{{ $prov->nama }}</option> --}}
                            <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
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
                    <select class="form-control select2 select-address @error('kabupaten_kota_id') is-invalid @enderror" id="pmks-kabupaten" name="kabupaten_kota_id" data-old="{{old('kabupaten_kota_id') ?? $pmks->kabupaten_kota_id ?? ""}}">
                        @foreach ($kabupaten as $kab)
                            <option value="{{ $kab->id }}">{{ $kab->nama }}</option>
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
                    <select class="form-control select2 select-address @error('kecamatan_id') is-invalid @enderror" id="pmks-kecamatan" name="kecamatan_id" data-old="{{old('kecamatan_id') ?? $pmks->kecamatan_id ?? ""}}">
                        @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id }}"}>{{ $kec->nama }}</option>
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
                    <select class="form-control select2 select-address @error('kelurahan_id') is-invalid @enderror" id="pmks-kelurahan" name="kelurahan_id" data-old="{{old('kelurahan_id') ?? $pmks->kelurahan_id ?? ""}}">
                        @foreach ($kelurahan as $kel)
                            <option value="{{ $kel->id }}">{{ $kel->nama }}</option>
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

        <div class="form-group row">
            <label for="pmks-jenis-pmks" class="col-sm-2 col-form-label">Masalah kes. sosial</label>
            <div class="col-sm-10">
                <select class="form-control select2" id="pmks-jenis-pmks" name="jenis_pmks[]" multiple="multiple" data-placeholder="Pilih masalah kesejahteraan sosial yang dialami" style="width: 100%;">
                    @foreach($jenisPmks as $jenis)
                        <option value="{{ $jenis->id }}"
                            @if(isset($pmks))
                                @if(in_array($jenis->id, $pmks->jenis->pluck('id')->toArray())) selected="selected" @endif
                            @elseif (old('jenis_pmks'))
                                @if(in_array($jenis->id, old('jenis_pmks'))) selected="selected" @endif
                            @endif
                        >{{ $jenis->nama }}</option>
                    @endforeach
                </select>

                @error('jenis_pmks')
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
</div>
 
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline card-jenis-pmks" data-jenis="1" style="display: none;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Pengasuh</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input id="terlantar-asuhan-keluarga" class="form-check-input terlantar-pengasuh" type="radio" name="terlantar_asuhan" value="1"
                            @if(isset($pmks))
                                @if($pmks->pengasuh == 1) checked="checked" @endif
                            @elseif (old('terlantar_asuhan'))
                                @if(old('terlantar_asuhan') == 1) checked="checked" @endif
                            @else
                                checked="checked"
                            @endif
                        >
                        <label class="form-check-label" for="terlantar-asuhan-keluarga">Asuhan keluarga</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="terlantar-asuhan-panti" class="form-check-input terlantar-pengasuh" type="radio" name="terlantar_asuhan" value="2"
                            @if(isset($pmks))
                                @if($pmks->pengasuh == 2) checked="checked" @endif
                            @elseif (old('terlantar_asuhan'))
                                @if(old('terlantar_asuhan') == 2) checked="checked" @endif
                            @endif
                        >
                        <label class="form-check-label" for="terlantar-asuhan-panti">Asuhan panti</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="terlantar-nama-keluarga" class="col-sm-3 col-form-label">Nama keluarga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control terlantar-asuhan-keluarga @error('nama_keluarga') is-invalid @enderror" id="terlantar-nama-keluarga" name="nama_keluarga" placeholder="Nama keluarga yang mengasuh" maxlength="100" 
                        value="{{old('nama_keluarga') ?? $pmks->nama_keluarga ?? ""}}">

                        @error('nama_keluarga')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="terlantar-hubungan-keluarga" class="col-sm-3 col-form-label">Hubungan keluarga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control terlantar-asuhan-keluarga @error('hubungan_keluarga') is-invalid @enderror" id="terlantar-hubungan-keluarga" name="hubungan_keluarga" placeholder="Hubungan keluarga yang mengasuh" maxlength="100" 
                        value="{{old('hubungan_keluarga') ?? $pmks->hubungan_keluarga ?? ""}}">

                        @error('hubungan_keluarga')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="terlantar-panti-pengasuh" class="col-sm-3 col-form-label">Panti pengasuh</label>
                    <div class="col-sm-9">
                        <select class="form-control select2 terlantar-asuhan-panti" id="terlantar-panti-pengasuh" name="lembaga_kesejahteraan_sosial_id" data-placeholder="Pilih panti yang mengasuh" style="width: 100%;" disabled="disabled">
                            @foreach($lembagaKs as $lembaga)
                                <option value="{{ $lembaga->id }}"
                                    @isset($pmks)
                                        @if($lembaga->id == $pmks->lembaga_kesejahteraan_sosial_id) selected="selected" @endif
                                    @endisset
                                >{{ $lembaga->nama }}</option>
                            @endforeach
                        </select>

                        @error('lembaga_kesejahteraan_sosial_id')
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-3 text-right">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
