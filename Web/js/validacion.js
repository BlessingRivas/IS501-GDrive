$("#btn-login1").click(function(){
    //console.log("Usuario: " + $("#txt-email").val());
    var parametros = "usuario="+$("#txt-email").val() + "&codigo=1";
    console.log(parametros);

    if($("#txt-email").val() == ""){
        $("#txt-email").addClass('is-invalid');
        $("#txt-email").removeClass('is-valid');
    }
    else{
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);
                //if (respuesta.estatus == 1){
                       location.href = "login2.html";//redireccionar
            },
            error:function(error){
                console.error(error);
            }
        });
    }    
});

/*
$("#btn-login2").click(function () {

    var parametros = "password="+$("#txt-password").val();
    console.log("Password: " + $("#txt-password").val());
    
    if($("#txt-password").val() == ""){
        $("#txt-password").addClass('is-invalid');
        $("#txt-password").removeClass('is-valid');
    }
    else{
        
    } 
})
*/