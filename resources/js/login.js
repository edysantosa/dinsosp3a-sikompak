require('./app');
require ('../adminlte/plugins/jquery-validation/jquery.validate.min.js');
require ('../adminlte/plugins/jquery-validation/additional-methods.min.js');

$(document).ready(function() {
    // $.validator.setDefaults({
    //     submitHandler: function () {
    //         alert( "Form successful submitted!" );
    //     }
    // });
    $('#login-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 3
            },
        },
        messages: {
            email: {
                required: "Masukkan alamat email",
                email: "Masukkan alamat email yang valid"
            },
            password: {
                required: "Masukkan kata sandi",
                minlength: "Kata sandi minimal 3 karakter"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
