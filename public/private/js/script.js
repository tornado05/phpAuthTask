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

    $("#form_auth input[type=submit]").click(function(){
        var login = $("#login").val();
        var password = $("#password").val();
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../index.php', false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('login='+login+'&password='+password);
        xhttp.onreadystatechange = function() {
            if (xhttp.status == 200) {
                sessionStorage.setItem("token",xhttp.responseText)
            }
        }
    });

});

