require('./app');
require ('../adminlte/plugins/jquery-validation/jquery.validate.min.js');
require ('../adminlte/plugins/jquery-validation/additional-methods.min.js');

$(document).ready(function() {
    $('#user-create-form').validate({
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
        processData: false
    })
    
    .fail(function(xhr){
        var message = "Unknown error has occured";
        if( xhr.responseJSON ){
            message = xhr.responseJSON.message;
        }

        Notification.error(message);
    })
    
    .done(function( response ){
        Notification.info(response.message);
        $(".profile-image").attr("src", response.image);
    });

    return false;

});
