/******************** Controlador Login******************************/
$('#btn-login1').on('click',function(e){
    e.preventDefault();

    if(checkEmail('email')){
        var parametros = "usuario="+$("#txt-email").val() + "&codigo=1";

        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);                
                location.href = "login2.html";//redireccionar
            },
            error:function(error){
                console.error(error);
            }
        });    
    }
});

$('#btn-login2').on('click',function(e){
    e.preventDefault();

    if(validar('password')){
        var parametros = "password="+$("#txt-password").val() + "&codigo=2";        
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);                
                location.href = "home.html";//redireccionar
            },
            error:function(error){
                console.log(error);
            }
        });
    }    
});

function validar(campo){
    if($("#txt-"+campo).val() == ""){
        $('.invalid-'+campo).css('display','block');
        return false;
    }
    else{
        $('.invalid-'+campo).css('display','none');
        return true;
    }
}

function validarFecha(){
    var Vdia = validarSelect('dia');
    var Vmes = validarSelect('mes');
    var Vanio = validarSelect('mes');

    if(Vdia && Vmes && Vanio){
        return true;
    }else{
        $('.invalid-fecha').css('display','block');
        return false;
    }
}

function checkEmail(campo){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if($('#txt-'+campo).val() == ""){
        $('.invalid-'+campo).css('display','block');
        $('.wrong-'+campo).css('display','none');
        return false;
    }
    else{    
        if (re.test($("#txt-email").val())){
            $('.wrong-'+campo).css('display','none');
            return true;
        }
        else{
            $('.wrong-'+campo).css('display','block');
            $('.invalid-'+campo).css('display','none');
            return false;        
        }
    }        
}