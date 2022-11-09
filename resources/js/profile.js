require('./app');
require ('../adminlte/plugins/jquery-validation/jquery.validate.min.js');
require ('../adminlte/plugins/jquery-validation/additional-methods.min.js');
import toastr from '../adminlte/plugins/toastr/toastr.min.js';

$(document).ready(function() {
    $('.profile-form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 3
            },
            password_confirmation: {
                equalTo: "#password"
            },
        },
        messages: {
            name: {
                required: "Masukkan nama",
            },
            email: {
                required: "Masukkan alamat email",
                email: "Masukkan alamat email yang valid"
            },
            password: {
                required: "Masukkan kata sandi",
                minlength: "Kata sandi minimal 3 karakter"
            },
            password_confirmation: {
                equalTo: "Kata sandi harus sama"
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
}).on('click' , '.profile-user-img' , function( ev ){
    $("#image").trigger('click');
}).on('change' , '#image' , function( ev ){

    let formData = new FormData($('#image-form')[0]);

    $.ajax({
        url : 'profile',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('.profile-user-img').hide();
            $('.profile-user-img').parent().append('<span><i class="fas fa-spin fa-circle-notch"></i></span>');
        },
        complete: function() {
            $('.profile-user-img').show();
            $('.profile-user-img').parent().find('span').remove();
        },
    }).fail(function(xhr){
        var message = "Unknown error has occured";
        if( xhr.responseJSON ){
            message = xhr.responseJSON.message;
        }

        toastr.error(message);
    }).done(function( response ){
        $(".profile-user-img").attr("src", response.image);
    });

    return false;

});
