require('./app');
require ('../adminlte/plugins/jquery-validation/jquery.validate.min.js');
require ('../adminlte/plugins/jquery-validation/additional-methods.min.js');
require ('../adminlte/plugins/jquery-validation/localization/messages_id.min.js');

window.moment = require('moment');
require ('../adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');

import select2 from '../adminlte/plugins/select2/js/select2.full.min.js';

$(document).ready(function() {
    $('#pmks-create-form').validate({
        rules: {
            nik: {
                required: true,
            },
            nama: {
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
        for (var i = 0; i < response.kabupaten.length; i++) {
            $("#pmks-kabupaten").append(new Option(response.kabupaten[i].nama, response.kabupaten[i].kabupaten_id, true, true));
        }
        $("#pmks-kabupaten").trigger('change');
    }).always(function(){
    });

});

$('.select2').select2({
    theme: 'bootstrap4'
})