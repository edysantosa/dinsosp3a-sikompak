require('./app');
require ('../adminlte/plugins/jquery-validation/jquery.validate.min.js');
require ('../adminlte/plugins/jquery-validation/additional-methods.min.js');
require ('../adminlte/plugins/jquery-validation/localization/messages_id.min.js');

window.moment = require('moment');
require ('../adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');

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
});
