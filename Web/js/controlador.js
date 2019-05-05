$("#sh-password").click(function(){
    if($("#txt-password").attr("type") == "text"){
        $("#txt-password").attr("type","password");
        $(this).html('<i class="far fa-eye">');
        $("#txt-password").focus();
    }
    else{
        $("#txt-password").attr("type","text");
        $(this).html('<i class="far fa-eye-slash">');
        $("#txt-password").focus();
    }
});

/********************Controlador LogIn********************/
$('#btn-login1').on('click',function(e){
    e.preventDefault();

    if(checkEmail('email')){
        var parametros = "correo=" + $("#txt-email").val() + "&codigo=login1";
        $(".loading-container").css('display','block');
        $(".loading-bar").css('display','block');
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);
                if(respuesta.codigo == 1){
                    $('.wrong-email').css('display','none');
                    $(".loading-container").css('display','block');
                    $(".loading-bar").css('display','block');
                    location.href = "login2.php";//redireccionar                    
                }
                else
                    $('.wrong-email').css('display','block');
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
        var parametros = "password=" + $("#txt-password").val() + "&codigo=login2";        
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);
                if(respuesta.codigo == 1){
                    $('.wrong-password').css('display','none');
                    location.href = "home.php";//redireccionar
                }else{
                    $('.wrong-password').css('display','block');
                }
            },
            error:function(error){
                console.log(error);
            }
        });
    }    
});

/**********************************************************/
/********************Controlador SignIn********************/
/**********************************************************/
for(var i=1;i<=31;i++){
    $('#slc-dia').append(`<option value="${i}">${i}</option>`);
}

$("#btn-user-mail").click(function(){
    if($(this).html() == "Usar mi dirección de correo electrónico actual en su lugar"){
        $(this).html("Obtener un nuevo correo");
        $("#gmail-label").css("display","none");
    }else{
        $(this).html("Usar mi dirección de correo electrónico actual en su lugar");
        $("#gmail-label").css("display","block");
    }
});

$("#btn-registro-1").click(function(){
    var parametros = "nombre="+$("#txt-nombre").val() +
        "&apellido="+$("#txt-apellido").val() +
        "&usuario="+$("#txt-nombre-usuario").val() +
        "&correo="+$("#txt-nombre-usuario").val() + "@gmail.com" +
        "&password="+$("#txt-password-usuario").val() +
        "&codigo=signin1";

    var v_nombre = validar("nombre");
    var v_apellido = validar("apellido");
    var v_nombre_usuario = validar("nombre-usuario");
    var v_password = validar("password-usuario");
    var v_confirmacion = validar("password-confirm");
    var v_comparacion = comparar();

    console.log(parametros);

    if(v_nombre && v_apellido && v_nombre_usuario && v_password && v_confirmacion && v_comparacion)
    {
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                console.log(respuesta);
                       location.href = "registro2.php";//redireccionar
            },
            error:function(error){
                console.error(error);
            }
        });        
    }
});

$("#btn-registro-2").click(function(){
    var parametros = "pais=" + $("#slc-country").val() +
        "&telefono=" + $("#txt-telefono").val() +
        "&correoalterno=" + $("#txt-correo-recuperacion").val() +
        "&dia=" + parseInt($("#slc-dia").val()) +
        "&mes=" + parseInt($("#slc-mes").val()) +
        "&anio=" + parseInt($("#slc-anio").val()) +
        "&genero=" + parseInt($("#slc-genero").val()) +
        "&codigo=signin2";

    var v_fecha = validarFecha();
    var v_genero = validarSelect("genero");
    
    if(!v_genero){
        $('.invalid-genero').css('display','block');
    }
    else{
        $('.invalid-genero').css('display','none');
    }

    console.log(parametros);

    if(v_fecha && v_genero)
    {
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            dataType:"json",
            method:"POST",
            success:function(respuesta){
                if(respuesta.codigo == 1)                    
                    location.href = "registro3.html";//redireccionar                
            },
            error:function(error){
                console.error(error);
            }
        });
        
    }    
});

$("#btn-registro-3").click(function(){
    location.href = "home.php";
});

$('#privacy-div').on('scroll',function(){
    var posicion = $('#privacy-div').scrollTop();
    var bordeSuperior = $('#privacy-div').offset().top;
    var altura = $('#privacy-div').innerHeight();
    var fondo = bordeSuperior + altura;

    if(posicion >= bordeSuperior - 90){
        $('#btn-registro-3').removeAttr('disabled');;
    }

});


/**********************************************************/
/*********************Controlador Home*********************/
/**********************************************************/
$("#btn-user-home").on('click',function(){
    $("#menu-user-home").toggle();    
});

$("#btn-user-home").on('blur',function(){
    setTimeout(() => {
        $("#menu-user-home").css('display','none');
    }, 500);    
});

$("#btn-folder").on('click',function(){
    $(".folder-div").toggle();
});

$("#btn-new").on('click',function(){
    $(".new-div").toggle();
});

$("#btn-folder").on('blur',function(){
    setTimeout(() => {
        $(".folder-div").css('display','none');
    }, 500);    
});

$("#btn-new").on('blur',function(){
    setTimeout(() => {
        $(".new-div").css('display','none');
    }, 500);
});

$('.btn-new-folder').on('click',function(){
    $("#newFolderModal").modal('show');
    $("#txt-new-folder").val("");
    $("#btn-add-folder").attr('disabled',"");
});

$("#txt-new-folder").on('input',function(){
    if ($(this).val() == "")
        $("#btn-add-folder").attr('disabled',"");
    else
        $("#btn-add-folder").removeAttr('disabled');
});


/*****************Crear Carpeta************************/

$("#btn-add-folder").on('click',function(){
    var parametros = "nombre_carpeta=" + $("#txt-new-folder").val() + "&codigo=newfolder";

    $.ajax({
        url:'./ajax/login.php',
        data: parametros,
        method: "POST",
        dataType: "json",
        success: function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1){
                $("#txt-new-folder").val("");
                $("#newFolderModal").modal('hide');
                $("#btn-add-folder").attr('disabled',"");
                $("#no-folders-found").css('display','none');
                $(".folders-div div.row").append(
                    `<div class="col-12 col-md-4 col-lg-3">
                        <div class="folder-card" ondblclick=getFolderFiles("${respuesta.contenido.CODIGO_CARPETA}")>
                            <div class="folder-card-text">
                                <i class="fas fa-folder"></i><span class="folder-card-name">${respuesta.contenido.NOMBRE}</span>
                            </div>
                            <span class="folder-edit" title="Editar propiedades"><i class="fas fa-pen" onclick=getFolderInfo("${respuesta.contenido.CODIGO_CARPETA}")></i></span>
                        </div>
                    </div>`
                );
            }
        },
        error: function(error){
            console.error(error);
        }
    });
});

/********************Subir archivo**************************/
$('.btn-new-file').on('click',function(){
    $("#newFileInput").click();    
});

$("#newFileInput").on('change',function(){
    var datos=new FormData($("#new-file-form")[0]);
    datos.append("codigo","uploadfile");    
    
    $.ajax({
        url:"./ajax/login.php",
        method:"POST",
        dataType:"json",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
            if(respuesta.codigo==1){
                console.log(respuesta);
                $(".uploaded-warning").fadeIn(600);
                setTimeout(() => {
                    $(".uploaded-warning").fadeOut(600);
                }, 2000);
                location.href = "home.php";                
            }
            else
                console.log(respuesta.mensaje);            
        },
        error:function(error){
            console.log(error);
        }
    });
});

$("#close-warning").on('click',function(){
    $(".uploaded-warning").fadeOut(600);
});


/********************Subir foto perfil**************************/
$("#home-user-img").on('click',function(){
    $("#profilePicModal").modal("show");
    $("#profilePicPreview").attr("src",'data/profile_pics/generic.jpg');
});

$("#profilePicPreview").on('click',function(){
    $("#profilePicInput").click();
});

$("#profilePicInput").change(function(evt){
    var lector = new FileReader();    
    lector.readAsDataURL(evt.target.files[0]);
    lector.onload = function(){
        $("#profilePicPreview").attr("src",lector.result);
        console.log(lector.result);
    }         
    $("#btn-upload-pic").removeAttr("disabled");    
});

$("#btn-upload-pic").click(function(){
    var datos=new FormData($("#profile-pic-form")[0]);   
    datos.append("codigo","changepic");
    $("#btn-upload-pic").attr("disabled","");
    
    $.ajax({
        url:"./ajax/login.php",
        method:"POST",
        dataType:"json",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,                    
        success:function(respuesta){            
            if(respuesta.codigo==1){                
                $("#home-user-img").attr("src",respuesta.contenido);
                $("#profilePicModal").modal("hide");
                console.log(respuesta);
            }
            else
                console.log(respuesta.mensaje);            
        },
        error:function(error){
            console.log(error);
        }
    });
});

/********************Modal's Planes********************/
$("#abrirmodal1").click(function(){
    $("#Modal1plan1").modal("show");
});

$("#abrirmodal2").click(function(){
    $("#Modal1-plan2").modal("show");
});

$("#btn-aceptar-modalplan1").click(function(){
    $("#Modal2-plan1").modal("show");
    $("#Modal1-plan1").modal("hide");
});

$("#btn-aceptar-modal2plan1").click(function(){
    $("#Modal3-plan1").modal("show");
    $("#txt-codigo-plan").val("2");
    $("#Modal2-plan1").modal("hide");
});

$("#btn-aceptar-modalplan2").click(function(){
    $("#Modal2-plan2").modal("show");
    $("#Modal1-plan2").modal("hide");
});

$("#btn-aceptar-modal2plan2").click(function(){
    $("#Modal3-plan1").modal("show");
    $("#txt-codigo-plan").val("3");
    $("#Modal2-plan2").modal("hide");
});

$("#btn-registrar-tarjeta").on('click',function (){
    var VcardNumber = validar('numero-tarjeta');
    var VcardDate = validar('fecha-tarjeta');
    var VcardName = validar('nombre-tarjeta');
    var VcardCcv = validar('ccv-tarjeta');
    var VcardEntity = validar('entidad-tarjeta');
    var VcardCurrency = validar('moneda-tarjeta');
    
    
    if(VcardNumber && VcardDate && VcardName && VcardCcv && VcardEntity && VcardCurrency){
        var parametros = "codigo_entidad=" + $('#txt-entidad-tarjeta').val() +
                         "&codigo_moneda=" + $("#txt-moneda-tarjeta").val() +
                         "&numero_tarjeta=" + $("#txt-numero-tarjeta").val() +
                         "&nombre_propietario=" + $("#txt-nombre-tarjeta").val() +
                         "&fecha_tarjeta=" + $("#txt-fecha-tarjeta").val() +
                         "&codigo_tarjeta=" + $("#txt-ccv-tarjeta").val() +
                         "&codigo_plan=" + parseInt($("#txt-codigo-plan").val()) +
                         "&codigo=addCard";
        
        $.ajax({
            url:"./ajax/login.php",
            data:parametros,
            method:"POST",
            dataType:"json",
            success: function(respuesta){
                if(respuesta.codigo == 1){
                    $("#Modal3-plan1").modal('hide');
                    location.href = "home.php";
                } else {
                    console.log(respuesta);
                }
            },
            error: function(error){
                console.error(error);
            }
        });
    }
});

/********************Modificar usuario********************/
$("#btn-modificar-usuario").on('click',function(){
    var parametros="";
    if ($("#txt-nombre").val() !="")
        parametros += "nombre=" + $("#txt-nombre").val() + " " + $("#txt-apellido").val();
    
    if ($("#txt-telefono").val() !="")
        parametros += "&telefono=" + $("#txt-numero-telefono").val();

    if($("#txt-correo-alterno").val() != "")
        parametros += "&correoAlterno=" + $("#txt-correo-alterno").val();

    if($("#slc-dia").val() != "")
        parametros += "&dia=" + parseInt($("#slc-dia").val());
    if($("#slc-mes").val() != "")
        parametros += "&mes=" + parseInt($("#slc-mes").val());
    if($("#slc-anio").val() != "")
        parametros += "&anio=" + parseInt($("#slc-anio").val());
    if($("#slc-genero").val() != "")
        parametros += "&genero=" + parseInt($("#slc-genero").val());                       
    parametros += "&codigo=alterUser";
    $.ajax({
        url:"./ajax/login.php",
        data: parametros,
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            if(respuesta.codigo == 1){
                location.href = "home.php";
            } else {
                console.log(respuesta);
            }
        },
        error:function(error){
            console.error(error);
        }
    });
                     
});

/********************Funciones********************/

var placeholder="";
var inputs = $("input[class='focus-field']");
var titulos = $(".field-title");
var bordes = $(".field-border");
var warnings = $(".invalid-feedback");

var i=0;

while (i<inputs.length) {
    setFunciones(inputs[i],bordes[i],titulos[i],warnings[i]);
    i++;
}

function setFunciones(input, borde, titulo, warning){
    $(input).on("focus",function(){         
        $(titulo).css("display","block");
        placeholder = $(this).attr("placeholder");
        $(this).attr("placeholder","");
        $(borde).css("border","2px solid #5C67D2");        
    });

    $(input).on("blur",function(){
        $(titulo).css("display","none");        
        $(this).attr("placeholder",placeholder);
        $(borde).css("border","1px solid lightgray");

        if($(this).val() != "" && $(warning).css("display") == "block"){
            $(warning).css("display","none");
        }     
    });   
}

function comparar(){
    if ($("#txt-password-usuario").val() == $("#txt-password-confirm").val())
        return true;
    else{
        $('.nomatch-password-confirm').css('display','block');
        return false;
    }
}

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
    var Vanio = validarSelect('anio');

    if(Vdia && Vmes && Vanio){
        $('.invalid-fecha').css('display','none');
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

function getFolderInfo(codigo_carpeta){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_carpeta=" + codigo_carpeta + "&codigo=getFolderInfo",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            $(".folder-info-div").toggle();
            $("#folder-info-name").val(respuesta.contenido.NOMBRE);
            $("#folder-info-fecha-creacion").html(respuesta.contenido.FECHA_CREACION);
            $("#folder-info-fecha-modificacion").html(respuesta.contenido.FECHA_MODIFICACION);
            $("#folder-info-fecha-ultimo-acceso").html(respuesta.contenido.FECHA_ULTIMO_ACCESO);
        },
        error:function(error){
            console.error(error);
        }
    });
}

function getFolderFiles(codigo_carpeta){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_carpeta=" + codigo_carpeta + "&codigo=getFolderFiles",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta.contenido);
            $(".files-div .row").html("");
            if(respuesta.contenido.length == 0) {
                $(".files-div .row").html(`<span id="no-folders-found" style="color:lightslategray;margin-left:auto;margin-right:auto;font-size:1em;font-family:\'Open sans\';">¡No hay archivos en esta carpeta!</span>`);
            } else {
                for(var i=0;i<respuesta.contenido.length;i++){
                    $(".files-div .row").append(`
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="file-card">
                            <div class="text-center file-card-img">
                                <img src="img/${respuesta.contenido[i].ICONO}" width="40%" alt="">
                            </div>
                            <div class="file-card-text">
                                <span class="file-card-name">${respuesta.contenido[i].NOMBRE}</span>
                            </div>
                            <div class="file-bar">
                                <span class="file-stare"><i class="fas fa-star" onclick=stareFile("${respuesta.contenido[i].CODIGO_ARCHIVO}")></i></span>
                                <span class="file-share"><i class="fas fa-share-alt" onclick=shareFile("${respuesta.contenido[i].CODIGO_ARCHIVO}")></i></span>
                                <span class="file-delete"><i class="fas fa-trash-alt" onclick=deleteFile("${respuesta.contenido[i].CODIGO_ARCHIVO}")></i></span>
                                <span class="file-edit"><i class="fas fa-pen" onclick=getFileInfo("${respuesta.contenido[i].CODIGO_ARCHIVO}")></i></span>                                                
                            </div>                        
                        </div>
                    </div>
                    `);
                    console.log(respuesta.contenido[i].ICONO);
                }
            }
        },
        error:function(error){
            console.error(error);
        }
    });
}

function getFileInfo(codigo_archivo){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_archivo=" + codigo_archivo + "&codigo=getFileInfo",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1)
                location.href = "modificararchivo.php";
            /*$(".folder-info-div").toggle();
            $("#folder-info-name").val(respuesta.contenido.NOMBRE);
            $("#folder-info-fecha-creacion").html(respuesta.contenido.FECHA_CREACION);
            $("#folder-info-fecha-modificacion").html(respuesta.contenido.FECHA_MODIFICACION);
            $("#folder-info-fecha-ultimo-acceso").html(respuesta.contenido.FECHA_ULTIMO_ACCESO);*/
        },
        error:function(error){
            console.error(error);
        }
    });
}

$("#close-folder-info").on('click',function(){
    $(".folder-info-div").fadeOut(600);    
});

$("#btn-modificar-carpeta").on('click',function(e){
    e.preventDefault();
    var parametros = "";    
    if($("#slc-codigo-carpeta-padre").val() == ""){
        parametros = "nombre=" + $("#folder-info-name").val() + "&codigo=setFolderInfo";
    } else{
        parametros = "codigo_carpeta_padre=" + parseInt($("#slc-codigo-carpeta-padre").val()) + "&nombre=" + $("#folder-info-name").val() + "&codigo=setFolderInfo";
    }    
    
    $.ajax({
        url:"./ajax/login.php",
        data:parametros,
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            if (respuesta.codigo == 1){
                console.log(respuesta);
                //location.href = "home.php";
            }
            else{
                console.log(respuesta);
            }
        },
        error:function(error){
            console.error(error);
        }
    });
});

$("#btn-modificar-archivo").on('click',function(e){
    e.preventDefault();
    var parametros = "";    
    if($("#slc-carpeta-archivo").val() == ""){
        parametros = "nombre=" + $("#txt-nombre-archivo").val() + "&codigo=setFileInfo";
    } else{
        parametros = "codigo_carpeta_archivo=" + parseInt($("#slc-carpeta-archivo").val()) + "&nombre=" + $("#txt-nombre-archivo").val() + "&codigo=setFileInfo";
    }    
    
    parametros += "&descripcion=" + $("#txt-descripcion-archivo").val();
    
    $.ajax({
        url:"./ajax/login.php",
        data:parametros,
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            if (respuesta.codigo == 1){
                console.log(respuesta);
                location.href = "home.php";
            }
            else{
                console.log(respuesta);
            }
        },
        error:function(error){
            console.error(error);
        }
    });
});

$("#btn-modificar-archivo-cancelar").on('click',function(){
    location.href = "home.php";
});

/*******************Eliminar archivo (Papelera)******************/
function deleteFile(codigo_archivo){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_archivo=" + parseInt(codigo_archivo) + "&codigo=deleteFile",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1){
                $("#file-card-" + codigo_archivo).fadeOut(600);
            }
                //location.href = "modificararchivo.php";
            /*$(".folder-info-div").toggle();
            $("#folder-info-name").val(respuesta.contenido.NOMBRE);
            $("#folder-info-fecha-creacion").html(respuesta.contenido.FECHA_CREACION);
            $("#folder-info-fecha-modificacion").html(respuesta.contenido.FECHA_MODIFICACION);
            $("#folder-info-fecha-ultimo-acceso").html(respuesta.contenido.FECHA_ULTIMO_ACCESO);*/
        },
        error:function(error){
            console.error(error);
        }
    });
}

function unDeleteFile(codigo_archivo){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_archivo=" + parseInt(codigo_archivo) + "&codigo=unDeleteFile",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1){
                $("#file-card-" + codigo_archivo).fadeOut(600);
            }
                //location.href = "modificararchivo.php";
            /*$(".folder-info-div").toggle();
            $("#folder-info-name").val(respuesta.contenido.NOMBRE);
            $("#folder-info-fecha-creacion").html(respuesta.contenido.FECHA_CREACION);
            $("#folder-info-fecha-modificacion").html(respuesta.contenido.FECHA_MODIFICACION);
            $("#folder-info-fecha-ultimo-acceso").html(respuesta.contenido.FECHA_ULTIMO_ACCESO);*/
        },
        error:function(error){
            console.error(error);
        }
    });
}
/*******************Compartir archivo******************/
$('.btn-new-folder').on('click',function(){
    $("#newFolderModal").modal('show');
    $("#txt-new-folder").val("");
    $("#btn-add-folder").attr('disabled',"");
});

$("#txt-compartir-usuario").on('input',function(){
    if ($(this).val() == "" || $("#slc-tipo-compartido").val() == "")
        $("#btn-share-file").attr('disabled',"");
    else
        $("#btn-share-file").removeAttr('disabled');
});

$("#slc-tipo-compartido").on('input',function(){
    if ($(this).val() == "" || $("#txt-compartir-usuario").val() == "")
        $("#btn-share-file").attr('disabled',"");
    else
        $("#btn-share-file").removeAttr('disabled');
});

function shareFile(codigo_archivo){
    $("#shareFileModal").modal('show');
    $("#txt-compartir-archivo").val(codigo_archivo);
    $("#btn-share-file").attr('disabled',"");    
}

$("#btn-share-file").on('click',function(){
    var parametros = "codigo_archivo=" + parseInt($("#txt-compartir-archivo").val()) + 
                     "&correo_usuario=" + $("#txt-compartir-usuario").val() +
                     "&codigo_tipo_compartido=" + parseInt($("#slc-tipo-compartido").val()) +
                     "&enlace_compartido=http://www.drive.com/?file_id=" + $("#txt-compartir-archivo").val() +
                     "&codigo=shareFile";
    $.ajax({
        url:"./ajax/login.php",
        data:parametros,
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1){
                $("#share-file-message").html("Archivo compartido exitosamente");
                $("#share-file-message").css('display','block');
                setTimeout(() => {
                    $("#shareFileModal").modal('hide');
                }, 600);
            }                
        },
        error:function(error){
            $("#share-file-message").html("No se pudo compartir el archivo");
            $("#share-file-message").css('display','block');
            setTimeout(() => {
                $("#shareFileModal").modal('hide');
            }, 600); 
            console.error(error);
        }
    });    
});

/*******************Destacar archivo******************/
function stareFile(codigo_archivo){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_archivo=" + parseInt(codigo_archivo) + "&codigo=stareFile",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1){
                location.href="starred.php";
                //$("#file-card-" + codigo_archivo).fadeOut(600);
            }                
        },
        error:function(error){
            console.error(error);
        }
    });
}

function unStareFile(codigo_archivo){
    $.ajax({
        url:"./ajax/login.php",
        data:"codigo_archivo=" + parseInt(codigo_archivo) + "&codigo=unStareFile",
        method:"POST",
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if(respuesta.codigo == 1){
                $("#file-card-" + codigo_archivo).fadeOut(600);
            }                
        },
        error:function(error){
            console.error(error);
        }
    });
}