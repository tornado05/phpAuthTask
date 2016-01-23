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
        console.log("click submit");
        $.post("../../index.php", {
            login: $("#login").val(),
            password: $("#password").val()
        }, function(data){

        });
    });

});

