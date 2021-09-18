/**
* Desarrollado por: Jean Pierre Meza Cevallos
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
**/
/*oculta el navegador con la X en el menu móvil*/
$('#btn-close-nav').on('click', function(){
    $('#navbarSupportedContent').collapse('hide');
    $('body').css({//CORRIGE PROBLEMA DEL SCROLL CUANDO SE ABRE EL MANÚ EN CELULARES
        overflow: 'auto',
        height: 'auto'
    });
});

$('#navbarSupportedContent').on('show.bs.collapse', function () {
    $('body').css({//CORRIGE PROBLEMA DEL SCROLL CUANDO SE ABRE EL MANÚ EN CELULARES
        overflow: 'hidden',
        height: '100%'
    });
});  



Date.shortMonths = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
var today = new Date();
var mes=Date.shortMonths[today.getMonth()];
var date = String(today.getDate()).padStart(2, '0') + '/' + String(today.getMonth() +1).padStart(2, '0')  +'/' + today.getFullYear() + ' - '+ String(today.getHours()).padStart(2, '0') +':'+String(today.getMinutes()).padStart(2, '0');
var html_seleccione='<li class="list-group-item mnu-color px-0 h-150 pr-lg-2" style="min-width: 150px; text-align:right">'+
                        '<div class="w-100 d-flex flex-row-reverse mb-5"><p class="text-secondary aleofont" style="font-size: 40px; width:90px; line-height:35px; word-wrap: break-word;">Bienvenidos</p></div>' +
                        '<p class="mnu-uniline insubmenufontbold my-0" style="min-width: 100%;">Ecuador</p>'+
                        '<p class="hourtext mnu-uniline insubmenufont my-0" style="min-width: 100%;">'+date+'</p>'+
                    '</li>';
setInterval(function() {
    var today = new Date();
    var date = String(today.getDate()).padStart(2, '0') + '/' + String(today.getMonth() +1).padStart(2, '0')  +'/' + today.getFullYear() + ' - '+ String(today.getHours()).padStart(2, '0') +':'+String(today.getMinutes()).padStart(2, '0');
    html_seleccione='<li class="list-group-item mnu-color px-0 h-150 pr-lg-2" style="min-width: 150px; text-align:right">'+
                        '<div class="w-100 d-flex flex-row-reverse mb-5"><p class="text-secondary aleofont" style="font-size: 40px; width:90px; line-height:35px; word-wrap: break-word;">Bienvenidos</p></div>' +
                        '<p class="mnu-uniline insubmenufontbold my-0" style="min-width: 100%;">Ecuador</p>'+
                        '<p class="hourtext mnu-uniline insubmenufont my-0" style="min-width: 100%;">'+date+'</p>'+
                    '</li>';
    $('.hourtext').html(date);
}, 60000);

$(".inmenu").on("click", function(e){
    var liparent = $(e.target).parent();
    var childrends=liparent.find(".inmenu-items");
    $(".inmenu-parent").find('.current').removeClass("current");
    liparent.addClass("current"); //se oscurese
    if(childrends.children().length>0){
        $(".insubmenu").parent().css("background","rgb(187, 187, 187)");
        $(".insubmenu").html(childrends.html());
    }else{
        $(".insubmenu").parent().css("background","rgb(226, 226, 226)");
        $(".insubmenu").html(html_seleccione);
    }


    $(".insubmenu .plusmenu-title").on("click", function(e){
        var alement=$(e.target).closest("a");
        if($(alement).attr("href")=="" || $(alement).attr("href")=="#" || $(alement).attr("href")==null){
            var liparent = $(alement).parent();
            var elements=liparent.find(".plusmenu-items");
            var oculta=elements.hasClass("onplus");
        
            
            $('.onplus').parent().find(".plusmenu-title").removeClass("plusmenu-green");
            $('.onplus').parent().find('i').removeClass("fa-window-minimize").addClass("fa-plus");
            $('.onplus').removeClass("onplus");
            if(!oculta){
                liparent.find('i').removeClass("fa-plus").addClass("fa-window-minimize");
                if(elements){
                    elements.addClass('onplus', {duration:800});
                    liparent.find(".plusmenu-title").addClass("plusmenu-green");
                }
            }
            
        
            e.preventDefault();
            return;
        }
    });
    
    if($(e.target).attr("href")=="" || $(e.target).attr("href")=="#" || $(e.target).attr("href")==null){
        e.preventDefault();
        return;
    }
});



var element=$(".inmenu.current");
if(element){
    var childrends=element.find(".inmenu-items");
    if(childrends.length>0)
        $(".insubmenu").html(childrends.html());
    else
        $(".insubmenu").html(html_seleccione);
}

/*DA FUNCIONALIDAD AL MENU FLOTANTE*/
$(".float-parent .nav-link").on("click", function(e){
    var parent = $(e.target).parent();
    $(".float-parent .nav-link.active").removeClass("active");
    parent.find(".nav-link").addClass("active");
    $(".float-show").html(parent.find(".float-element").html());
});


var element=$(".float-parent .nav-link.active");
if(element){
    var childrends=element.parent().find(".float-element");
    if(childrends.length>0)
        $(".float-show").html(childrends.html());
    else
        $(".float-show").html("");
}


var captionsgl=[];

function mostrarcaption(index, caption){
    var indx=$('div.active').index();
    $('.carousel').carousel('pause');
    $('.carousel-caption').html(caption);
    $('.carousel-caption:eq('+indx+')').css({opacity:1});
    $('.carousel-caption:eq('+indx+')').on('mouseleave', ((j) => {  
        return function() {
            $('.carousel-caption:eq('+j+')').html(caption);
            $('.carousel-caption:eq('+j+')').css({opacity:.1});
            $('.carousel').carousel({interval: 3000});
        }
    })(index));
}

/*******************FUNCIONES PARA MANEJAR COOKIES EN JAVASCRIP**********************/
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}


//OCULTA MENU BANCA EN LINEA AL DAR CLIC EN EL FONDO
$('.fondo-opaco-close').on('click',function(){
    $('.fondo-opaco').hide();
    $('.dropclick').parents('.dropdown').find('.dropdown-menu').hide();
});

//MUESTRA EL MENÚ AL DAR CLIC EN EL DROPDOWN DE BANCA EN LINEA
$('.dropclick').on('click',function(){
    $('.dropclick').parents('.dropdown').find('.dropdown-menu').toggle();
    //dropdown is visible
    if($('.dropclick').parents('.dropdown').find('.dropdown-menu').is(":visible")){
        $('.fondo-opaco').show();
    }else{//dropdown is invisible
        $('.fondo-opaco').hide();
    }
});
