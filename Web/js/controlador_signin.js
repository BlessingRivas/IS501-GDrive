$("#btn-registro-1").click(function(){
    var parametros = "nombre="+$("#txt-nombre").val() +
    "&apellido="+$("#txt-apellido").val()+
    "&nombreusuario="+$("#txt-nombre-usuario").val()+
    "&pass="+$("#txt-password-usuario").val()+
                 "&codigo=1";

                 var v_nombre=validar("nombre");
                 var v_apellido=validar("apellido");
                 var v_nombre_usuario=validar("nombre-usuario");
                 var v_password=validar("password-usuario");
                 var v_confirmacion=validar("password-confirm");
                 var v_comparacion=comparar();

    console.log(parametros);

    if(v_nombre && v_apellido && v_nombre_usuario && v_password && v_confirmacion && v_comparacion)
    {
        $.ajax({
            url:"./ajax/loguear.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);
                       location.href = "registro2.html";//redireccionar
            },
            error:function(error){
                console.error(error);
            }
        });
        
    }
    else{
        
    }    
});

$("#btn-registro-2").click(function(){
    var parametros = "pais="+$("#slc-country").val() +
    "&telefono="+$("#txt-telefono").val()+
    "&correoalterno="+$("#txt-correo-recuperacion").val()+
    "&dia="+$("#slc-dia").val()+
    "&mes="+$("#slc-mes").val()+
    "&anio="+$("#slc-anio").val()+
    "&genero="+$("#slc-genero").val()
                 "&codigo=1";

                 var v_fecha=validarFecha();
                 var v_genero=validarSelect("genero");
                 if(v_genero==false){
                    $('.invalid-genero').css('display','block');
                 }

    console.log(parametros);

    if(v_fecha && v_genero)
    {
        $.ajax({
            url:"./ajax/loguear2.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);
                       location.href = "index.html";//redireccionar
            },
            error:function(error){
                console.error(error);
            }
        });
        
    }
    else{
        
    }    
});


function validar(campo){
    if($("#txt-"+campo).val() == ""){
        $('.invalid-'+campo).css('display','block');
        return false;
    }
    else{
    $('.invalid-'+campo).css('display','none');
        return true;}
}

function validarSelect(campo){
    if($("#slc-"+campo).val() == ""){
        return false;
    }
    else{
        return true;}
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

function comparar(){
    if ($("#txt-password-usuario").val() == $("#txt-password-confirm").val())
    return true;
    else 
    return false;
}