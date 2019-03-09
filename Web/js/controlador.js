var actualPosition = 0;

$(document).on('scroll',function(){
    var topVentana = $(document).scrollTop();
    var bottomVentana = window.innerHeight + topVentana;
    var logoPosition = $("#animate-logo").offset().top;
    var bottomLogo = logoPosition + $("#animate-logo").height();

    if(topVentana > logoPosition - 300){

        if($("#animate-logo").css("display") != "none"){
            $("#animate-logo").css("animation","fadeOutLogo 2s forwards");            
            $("#animate-file-types").css("animation","fadeInFileTypes 2s ease 500ms forwards");            
        }        
    }

    //var divBottom = $("#files-everywhere").height() + $("#files-everywhere").offset().top;
    var divBottom = $("#save-any-file").offset().top;    

    if(topVentana > divBottom - 50){
        $("#changing-link").css("display","block");
        $("#changing-link").css("animation","rollInLink 400ms forwards");
        $(".navbar-brand").css("color","black");
        $("#brand-logo").attr("src","img/brand-logo-2.png");
        $("#main-nav").css("background-color", "white");
        $(".nav-link").css("color","#555555");
    }
    else{        
        $("#changing-link").css("display","none");
        $("#changing-link").css("animation","none");
        $(".navbar-brand").css("color","white");
        $("#brand-logo").attr("src","img/brand-logo-1.png");
        $("#main-nav").css("background-color","transparent");
        $(".nav-link").css("color","white");
    }
    
    var newPosition = $(document).scrollTop();

    var opacity = parseFloat($("#fading-div").css("opacity"));

    var topSection1 = $("#surf-guy").offset().top;
    var bottomSection1 = $("#surf-guy").offset().top + $("#surf-guy").height();
    var actualMargin1 = parseInt($("#surf-guy img").css("margin-top"));
    var topSection2 = $("#sharing-cup").offset().top;
    var bottomSection2 = $("#sharing-cup").offset().top + $("#sharing-cup").height();
    var actualMargin2 = parseInt($("#sharing-cup img").css("margin-top"));
    var topSection3 = $("#dropped-stuff").offset().top;
    var bottomSection3 = $("#dropped-stuff").offset().top + $("#dropped-stuff").height();
    var actualMargin3 = parseInt($("#dropped-stuff img").css("margin-top"));

    if(newPosition > actualPosition){
        if(newPosition > $("#fading-div").offset().top && newPosition < divBottom){            
            $("#fading-div").css("opacity",(opacity - 0.01) + "");
        }
        
        if(newPosition > (topSection1 - 100) && newPosition < bottomSection1 + 50){            
            $("#surf-guy img").css("margin-top",(actualMargin1 - 1) + "px");
        }

        if(newPosition > (topSection2 - 100) && newPosition < bottomSection2 + 50){            
            $("#sharing-cup img").css("margin-top",(actualMargin2 - 1) + "px");
        }

        if(newPosition > (topSection3 - 100) && newPosition < bottomSection3 + 50){            
            $("#dropped-stuff img").css("margin-top",(actualMargin3 - 1) + "px");
        }

    }else{
        if(newPosition < $("#fading-div").offset().top){
            $("#fading-div").css("opacity","1");
        }
        else if(newPosition > $("#fading-div").offset().top && newPosition < divBottom){            
            $("#fading-div").css("opacity",(opacity + 0.01) + "");
        }

        if(newPosition > (topSection1 - 50) && newPosition < (bottomSection1 + 100)){
            $("#surf-guy img").css("margin-top",(actualMargin1 + 1) + "px");
        }

        if(newPosition > (topSection2 - 50) && newPosition < (bottomSection2 + 100)){
            $("#sharing-cup img").css("margin-top",(actualMargin2 + 1) + "px");
        }

        if(newPosition > (topSection3 - 50) && newPosition < (bottomSection3 + 100)){
            $("#dropped-stuff img").css("margin-top",(actualMargin3 + 1) + "px");
        }
    }

    actualPosition = newPosition;

});

$("#scroll-arrow").on("click",function(){
    var scrollTo = window.innerHeight;
    $('html, body').animate({scrollTop: scrollTo},1000);    
});