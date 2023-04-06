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
    $('#tanggal-lahir').datetimepicker('date', moment($('#student-tanggal-lahir').data('old')));

    $('.select2').select2();

    // Tampilkan form jenis pmks yang sudah terpilih sebelumnya
    let selectedJenis = $("#jenis-pmks").val();
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
        console.log('asdasd');
        $("#pmks-kabupaten").html('');
        for (var i = 0; i < response.kabupaten.length; i++) {
            $("#pmks-kabupaten").append(new Option(response.kabupaten[i].nama, response.kabupaten[i].id, true, true));
        }
        $("#pmks-kabupaten").val($('#pmks-kabupaten option:eq(0)').val()).trigger('change');
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
        $("#pmks-kecamatan").val($('#pmks-kecamatan option:eq(0)').val()).trigger('change');
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
        $("#pmks-kelurahan").val($('#pmks-kelurahan option:eq(0)').val()).trigger('change');
    }).always(function(){
    });
}).on('select2:select', '#jenis-pmks', function(e){
    var data = e.params.data;
    $(`.card-jenis-pmks*[data-jenis="${data.id}"]`).show();
}).on('select2:unselect', '#jenis-pmks', function(e){
    var data = e.params.data;
    $(`.card-jenis-pmks*[data-jenis="${data.id}"]`).hide();
});

$('.terlantar-asuhan').on('change', function() {
    if ($(this).val() == 'keluarga') {

    }
});