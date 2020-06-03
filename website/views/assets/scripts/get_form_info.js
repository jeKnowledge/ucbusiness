"use strict"

$(document).ready(function(){
    process_form();
});

function process_form() {
    $('form').submit(function (event) {
        var form_data = {
            'name' : $('input[name=name]').val(),
            'email' : $('input[name=email]').val(),
            'message' : $('input[name=message]').val()
        };

        console.log(form_data["name"]);
        console.log(form_data["email"]);
        console.log(form_data["message"]);
        

        $.ajax({
            type: 'POST',
            url: '/sendEmail',
            data: form_data,
            success: () => {
                console.log('já está');
            }
        });
        
        event.preventDefault();
    });
}