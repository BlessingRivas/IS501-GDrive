/*$(".login-container").on("click",function(){    
    console.log(FocusEvent.prototype);
    if($(".login-field-title").css("display") == "block"){
        $(".login-field-title").css("display","none");
        $("#txt-email").attr("placeholder","Correo electrónico o teléfono");
        $(".login-field-email").css("border","1px solid lightgray");
    }
});*/

var placeholder="";

$("#txt-email,#txt-password").on("focus",function(){
    $(".login-field-title").css("display","block");
    placeholder = $(this).attr("placeholder");
    $(this).attr("placeholder","");
    $(".login-field-email").css("border","2px solid blue");    
});

$("#txt-email,#txt-password").on("blur",function(){    
    $(".login-field-title").css("display","none");    
    $(this).attr("placeholder",placeholder);
    $(".login-field-email").css("border","1px solid lightgray");
});

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

$("#btn-aceptar-modalplan1").click(function(){
    $("#Modal2-plan1").modal("show");
    $("#Modal1-plan1").modal("hide");
});

$("#btn-aceptar-modal2plan1").click(function(){
    $("#Modal3-plan1").modal("show");
    $("#Modal2-plan1").modal("hide");
});

$("#btn-aceptar-modalplan2").click(function(){
    $("#Modal2-plan2").modal("show");
    $("#Modal1-plan2").modal("hide");
});

$("#btn-aceptar-modal2plan2").click(function(){
    $("#Modal3-plan2").modal("show");
    $("#Modal2-plan2").modal("hide");
});