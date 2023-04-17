require('./app');
require ('../adminlte/plugins/jquery-validation/jquery.validate.min.js');
require ('../adminlte/plugins/jquery-validation/additional-methods.min.js');
require ('../adminlte/plugins/jquery-validation/localization/messages_id.min.js');

window.moment = require('moment');
require ('../adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');

import select2 from '../adminlte/plugins/select2/js/select2.full.min.js';
import toastr from '../adminlte/plugins/toastr/toastr.min.js';

$(document).ready(function() {
    $('#pmks-create-form').validate({
        rules: {
            nik: {
                required: true,
            },
            nama: {
                required: true,
            },
            tanggal_lahir: {
                required: true,
            },
        },
        messages: {
            nik: {
                required: "Masukkan NIK",
            },
            nama: {
                required: "Masukkan Nama",
            },
            tanggal_lahir: {
                required: "Masukkan tanggal lahir",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.parent().append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#tanggal-lahir').datetimepicker({
        format: 'L',
        locale : 'id'
    });
    $('#tanggal-lahir').datetimepicker('date', moment($('#pmks-tanggal-lahir').data('old'), 'DD/MM/YYYY'));

    $('.select2').select2();


    // Trigger change untuk data old di alamat
    let oldProvinsi = $('#pmks-provinsi').data('old') || '51';
    $('#pmks-provinsi').val(oldProvinsi).trigger('change');

    // Tampilkan form jenis pmks yang sudah terpilih sebelumnya
    // TBA
    let selectedJenis = $("#pmks-jenis-pmks").val();
    for (var i = selectedJenis.length - 1; i >= 0; i--) {
        $(`.card-jenis-pmks*[data-jenis="${selectedJenis[i]}"]`).show();
    }

}).on('change', '.select-address', function(e){
    //Kosongkan old value jika provinsi berubah
    if ($(this).find(":selected").val() != $(this).data('old')) {
        $('.select-address').data('old', '');
    }
}).on('change', '#pmks-provinsi', function(e){
    // console.log($(this).find(":selected").val());
    // console.log($(this).select2('data'));
    $.ajax({
        url      : `/address/kabupaten`,
        type     : 'get',
        dataType : 'json',
        data     : {provinsi_id:$(this).find(":selected").val()},
        headers  : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#kabupaten-loader').show();
            $("#pmks-kabupaten").prop("disabled", true);
        },
        complete: function() {
            $('#kabupaten-loader').hide();
            $("#pmks-kabupaten").prop("disabled", false);
        },
    }).fail(function(xhr, status, statusText){
        var message = "Unknown error has occured";
        if( xhr.responseJSON ){
            message = xhr.responseJSON.message;
        }
        toastr.error(message);

    }).done(function( response ){
        $("#pmks-kabupaten").html('');
        for (var i = 0; i < response.kabupaten.length; i++) {
            $("#pmks-kabupaten").append(new Option(response.kabupaten[i].nama, response.kabupaten[i].id, true, true));
        }

        // Trigger change untuk data old di alamat
        let oldKabupaten = $('#pmks-kabupaten').data('old') || $('#pmks-kabupaten option:eq(0)').val();
        $("#pmks-kabupaten").val(oldKabupaten).trigger('change');
    }).always(function(){
    });
}).on('change', '#pmks-kabupaten', function(e){
    $.ajax({
        url      : `/address/kecamatan`,
        type     : 'get',
        dataType : 'json',
        data     : {kabupaten_kota_id:$(this).find(":selected").val()},
        headers  : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#kecamatan-loader').show();
            $("#pmks-kecamatan").prop("disabled", true);
        },
        complete: function() {
            $('#kecamatan-loader').hide();
            $("#pmks-kecamatan").prop("disabled", false);
        },
    }).fail(function(xhr, status, statusText){
        var message = "Unknown error has occured";
        if( xhr.responseJSON ){
            message = xhr.responseJSON.message;
        }
        toastr.error(message);

    }).done(function( response ){
        $("#pmks-kecamatan").html('');
        for (var i = 0; i < response.kecamatan.length; i++) {
            $("#pmks-kecamatan").append(new Option(response.kecamatan[i].nama, response.kecamatan[i].id, true, true));
        }

        // Trigger change untuk data old di alamat
        let oldKecamatan = $('#pmks-kecamatan').data('old') || $('#pmks-kecamatan option:eq(0)').val();
        $("#pmks-kecamatan").val(oldKecamatan).trigger('change');
    }).always(function(){
    });
}).on('change', '#pmks-kecamatan', function(e){
    $.ajax({
        url      : `/address/kelurahan`,
        type     : 'get',
        dataType : 'json',
        data     : {kecamatan_id:$(this).find(":selected").val()},
        headers  : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#kelurahan-loader').show();
            $("#pmks-kelurahan").prop("disabled", true);
        },
        complete: function() {
            $('#kelurahan-loader').hide();
            $("#pmks-kelurahan").prop("disabled", false);
        },
    }).fail(function(xhr, status, statusText){
        var message = "Unknown error has occured";
        if( xhr.responseJSON ){
            message = xhr.responseJSON.message;
        }
        toastr.error(message);

    }).done(function( response ){
        $("#pmks-kelurahan").html('');
        for (var i = 0; i < response.kelurahan.length; i++) {
            $("#pmks-kelurahan").append(new Option(response.kelurahan[i].nama, response.kelurahan[i].id, true, true));
        }

        // Trigger change untuk data old di alamat
        let oldKelurahan = $('#pmks-kelurahan').data('old') || $('#pmks-kelurahan option:eq(0)').val();
        $("#pmks-kelurahan").val(oldKelurahan).trigger('change');
    }).always(function(){
    });
}).on('select2:select', '#pmks-jenis-pmks', function(e){
    var data = e.params.data;
    $(`.card-jenis-pmks*[data-jenis="${data.id}"]`).show();
}).on('select2:unselect', '#pmks-jenis-pmks', function(e){
    var data = e.params.data;
    $(`.card-jenis-pmks*[data-jenis="${data.id}"]`).hide();
});


// Kode untuk jenis-jenis PMKS
$('.terlantar-pengasuh').on('change', function() {
    if ($(this).val() == 'keluarga') {
        $('#terlantar-nama-keluarga').prop("disabled", false);
        $('#terlantar-hubungan-keluarga').prop("disabled", false);
        $('#terlantar-panti-pengasuh').prop("disabled", true);
    } else {
        $('#terlantar-nama-keluarga').prop("disabled", true);
        $('#terlantar-hubungan-keluarga').prop("disabled", true);
        $('#terlantar-panti-pengasuh').prop("disabled", false);
    }
});