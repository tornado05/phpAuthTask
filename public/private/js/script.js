$(document).ready(function(){
    if(sessionStorage.getItem('token')){
        $.get('/', function (data) {
            $('#form_auth').css('visibility','hidden');
            $('body').html(data);
        }).fail(function (error) {
            console.log("something went wrong");
            console.log("Error " + error.status + ": " + error.statusText);
            $('#form_auth').css('visibility','visible');
        });
    }else{
        $('#form_auth').css('visibility','visible');
    }

    $("#form_auth input[type=submit]").click(function(event){
        event.preventDefault();
        $.post("../../index.php", {
            login: $("#login").val(),
            password: $("#password").val()
        }, function(data){
            var token = jQuery.parseJSON(data);
            sessionStorage.setItem("token",token.token);
            $('#form_auth').css('visibility','hidden');
            $("#success_login_pass").css("visibility","visible");
        }).fail(function(){
            $("#error_message").css("visibility","visible");
        });
    });

});

