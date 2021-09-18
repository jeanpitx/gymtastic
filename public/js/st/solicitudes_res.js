/**
* Desarrollado por: Jean Pierre Meza Cevallos
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
**/
$('#producto').val("2");

/*$('input[type=file][data-max-size]').change(function (e){
    $("#ico_mecanizado").removeClass("fa-exclamation-triangle").addClass("fa-check-circle").css( "color", "green" );
});*/
/*$("input[name='url_archivo_his']").change(function (e){
    $("#ico_historial").removeClass("fa-exclamation-triangle").addClass("fa-check-circle").css( "color", "green" );
});
$("input[name='url_archivo_cert']").change(function (e){
    $("#ico_certificado").removeClass("fa-exclamation-triangle").addClass("fa-check-circle").css( "color", "green" );
});
$("input[name='url_archivo_rol']").change(function (e){
    $("#ico_rol").removeClass("fa-exclamation-triangle").addClass("fa-check-circle").css( "color", "green" );
});*/

//FUNCION LIMITA TAMAÑO MAXIMO DE ARCHIVOS
$(function(){
    $('input[type=file][data-max-size]').change(function(e){
        var fileInput = $(e.target);
        var maxSize = fileInput.data('max-size');
        if(fileInput.get(0).files.length){
            var fileSize = fileInput.get(0).files[0].size; // in bytes
            if(fileSize>maxSize){
                alert('El tamaño del archivo supera el tamaño máximo de 5 Mb');
                fileInput.val('').trigger('change');
                fileInput.parent().parent().parent().parent().parent().find('.fas')
                        .removeClass("fa-check-circle").addClass("fa-exclamation-triangle").css( "color", "#deae0c" );
                return false;
            }else{
                fileInput.parent().parent().parent().parent().parent().find('.fas')
                        .removeClass("fa-exclamation-triangle").addClass("fa-check-circle").css( "color", "green" );
            }
        }

    });
});

//FUNCIONES COMBOS CON FILTRO
$(function () {
    //detecta cambio en input y le cambia el texto bootstrap
    $('.custom-file-input').on('change', function(event) {
        var inputFile = event.currentTarget;
        if($(event.target).get(0).files.length){
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        }
    }); 

    //VALIDA Y EVITA QUE SE OCULTE TODOS LOS COLLAPSES
    $("button[aria-controls='colapsito']").on("click", function(e){
        if($('#colapsito').hasClass("show"))
            e.stopPropagation();
    });
    $("button[aria-controls='colapsito1']").on("click", function(e){
        if(!validaPersonales()){ e.stopPropagation(); return;}

        if($('#colapsito1').hasClass("show"))
            e.stopPropagation();
    });
    $("button[aria-controls='colapsito2']").on("click", function(e){
        if(!validaPersonales()){ e.stopPropagation(); return;}

        if($('#colapsito2').hasClass("show"))
            e.stopPropagation();
    });
    $("button[aria-controls='colapsito3']").on("click", function(e){
        if(!validaPersonales()){ e.stopPropagation(); return;}
        if(!validaReferencias()){ e.stopPropagation(); return;}
        
        if($('#colapsito3').hasClass("show"))
            e.stopPropagation();
    });

    
    //BOTONES CONTINUAR, TAMBIEN VALIDA
    $('#btncontinua1').click(function (e) {
        if(!validaPersonales()){ e.stopPropagation(); return;}
        $([document.documentElement, document.body]).animate({
            scrollTop: 0
        }, 500);

        $('#colapsito').collapse('hide');
        $('#colapsito2').collapse('hide');
        $('#colapsito3').collapse('hide');
        $('#colapsito1').collapse('show');
        $("button[aria-controls='colapsito1']").removeClass("btn-secondary").addClass("btn-success");
    });
    $('#btncontinua2').click(function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: 0
        }, 500);

        $('#colapsito1').collapse('hide');
        $('#colapsito').collapse('hide');
        $('#colapsito3').collapse('hide');
        $('#colapsito2').collapse('show');
        $("button[aria-controls='colapsito1']").removeClass("btn-secondary").addClass("btn-success");
        $("button[aria-controls='colapsito2']").removeClass("btn-secondary").addClass("btn-success");
    });

    $('#btncontinua3').click(function (e) {
        if(!validaReferencias()){ e.stopPropagation(); return;}
        $([document.documentElement, document.body]).animate({
            scrollTop: 0
        }, 500);

        $('#colapsito1').collapse('hide');
        $('#colapsito').collapse('hide');
        $('#colapsito2').collapse('hide');
        $('#colapsito3').collapse('show');
        $("button[aria-controls='colapsito1']").removeClass("btn-secondary").addClass("btn-success");
        $("button[aria-controls='colapsito2']").removeClass("btn-secondary").addClass("btn-success");
        $("button[aria-controls='colapsito3']").removeClass("btn-secondary").addClass("btn-success");
    });

    

    //MUESTRA UNA PEQUEÑA ALERTA CUANDO HAY ERRORES DE VALIDACION HTML
    $('#btncontinua1').popover('hide');
    $("button[aria-controls='colapsito']").popover('hide');
    $("#btn_guarda_telefono").popover('hide');
    $("#btn_location_persona").popover('hide');
    $("#btn_guarda_telefono_empresa").popover('hide');
    $("#btn_location_empresa").popover('hide');
    $("#btn_guarda_cuenta").popover('hide');
    $("#btn_add_pariente").popover('hide'); 
    $('body').on("click", function(){
        $('#btncontinua1').popover('hide');
        $("button[aria-controls='colapsito']").popover('hide');
        $("#btn_guarda_telefono").popover('hide');
        $("#btn_location_persona").popover('hide');
        $("#btn_guarda_telefono_empresa").popover('hide');
        $("#btn_location_empresa").popover('hide');
        $("#btn_guarda_cuenta").popover('hide');
        $("#btn_add_pariente").popover('hide'); 
    });

    //HACE LAS VALIDACIONES NECESARIAS EN LA PRIMERA PESTAÑA
    function validaPersonales(){
        var retorna=true;
        //si no se ha guardado telefono persona, se guarda
        /*if($('#tipo_telefono').val()!=="Seleccione..." && $('#tipo_telefono').val()){
            $("#btn_guarda_telefono").trigger("click");
        }*/
        //si no se ha guardado telefono empresa, se guarda
        if($('#tipo_telefono_empresa').val()!=="Seleccione..." && $('#telefono_empresa').val()){
            $("#btn_guarda_telefono_empresa").trigger("click");
        }

        
        if(!$('#identificacion').val()){ $('#identificacion')[0].reportValidity(); retorna=false;}
        else if(!$('#nacionalidad').val()){ $('#nacionalidad')[0].reportValidity(); retorna=false;}
        else if(!$('#primern').val()){ $('#primern')[0].reportValidity(); retorna=false;}
        else if(!$('#segundon').val()){ $('#segundon')[0].reportValidity(); retorna=false;}
        else if(!$('#primera').val()){ $('#primera')[0].reportValidity(); retorna=false;}
        else if(!$('#segundoa').val()){ $('#segundoa')[0].reportValidity(); retorna=false;}
        else if(!$('#fecha_nacimiento').val()){ $('#fecha_nacimiento')[0].reportValidity(); retorna=false;}
        else if(!$('#sexo').val()){ $('#sexo')[0].reportValidity(); retorna=false;}
        else if(!$('#profesion').val()){ $('#profesion')[0].reportValidity(); retorna=false;} //SELECT2
        else if(!$('#estado_civil').val()){ $('#estado_civil')[0].reportValidity(); retorna=false;}
        else if(!$('#vivienda').val()){ $('#vivienda')[0].reportValidity(); retorna=false;}
        else if(!$('#anios_vivienda').val()){ $('#anios_vivienda')[0].reportValidity(); retorna=false;}
        else if(!$('#meses_vivienda').val()){ $('#meses_vivienda')[0].reportValidity(); retorna=false;}
        else if(!$('#provincia').val()){ $('#provincia')[0].reportValidity(); retorna=false;} //SELECT2
        else if(!$('#ciudad').val()){ $('#ciudad')[0].reportValidity(); retorna=false;} //SELECT2
        else if(!$('#correo').val()){ $('#correo')[0].reportValidity(); retorna=false;}
        else if(!$('#celular_persona').val()){ $('#celular_persona')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_primaria').val()){ $('#direccion_primaria')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_secundaria').val()){ $('#direccion_secundaria')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_referencia').val()){ $('#direccion_referencia')[0].reportValidity(); retorna=false;}
        else if(!$('#nombre_empresa').val()){ $('#nombre_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#actividad_empresa').val()){ $('#actividad_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#anios_laboral').val()){ $('#anios_laboral')[0].reportValidity(); retorna=false;}
        else if(!$('#meses_laboral').val()){ $('#meses_laboral')[0].reportValidity(); retorna=false;}
        else if(!$('#cargo').val()){ $('#cargo')[0].reportValidity(); retorna=false;}
        else if(!$('#provincia_empresa').val()){ $('#provincia_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#ciudad_empresa').val()){ $('#ciudad_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#correo_empresa').val()){ $('#correo_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_primaria_empresa').val()){ $('#direccion_primaria_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_secundaria_empresa').val()){ $('#direccion_secundaria_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_referencia_empresa').val()){ $('#direccion_referencia_empresa')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_sueldo').val()){ $('#usd_sueldo')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_servicios_basicos').val()){ $('#usd_servicios_basicos')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_alimentacion').val()){ $('#usd_alimentacion')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_arriendo').val()){ $('#usd_arriendo')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_transporte').val()){ $('#usd_transporte')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_vestimenta').val()){ $('#usd_vestimenta')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_educacion').val()){ $('#usd_educacion')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_salud').val()){ $('#usd_salud')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_terreno').val()){ $('#usd_terreno')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_casa').val()){ $('#usd_casa')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_vehiculo').val()){ $('#usd_vehiculo')[0].reportValidity(); retorna=false;}
        else if(!$('#usd_otras').val()){ $('#usd_otras')[0].reportValidity(); retorna=false;}

        //VALIDA DATOS CONYUGUE
        else if($('#estado_civil').val()=="CASADO" || $('#estado_civil').val()=="EN UNION DE HECHO"){    
            if(!$('#identificacion_conyugue').val()){ $('#identificacion_conyugue')[0].reportValidity(); retorna=false;}
            else if(!$('#nacionalidad_conyugue').val()){ $('#nacionalidad_conyugue')[0].reportValidity(); retorna=false;}
            else if(!$('#nombres_conyugue').val()){ $('#nombres_conyugue')[0].reportValidity(); retorna=false;}
            else if(!$('#fecha_nacimiento_conyugue').val()){ $('#fecha_nacimiento_conyugue')[0].reportValidity(); retorna=false;}
        }
        
        //VALIDACION SELECCIONA MAPA PERSONA
        else if(!$('#coordenadas').val()){
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("#btn_location_persona").offset().top - ($(window).height()/2))
            }, 500);
            $("#btn_location_persona").popover('show'); retorna=false;
        }

        //VALIDACION SELECCIONA MAPA EMPRESA
        else if(!$('#coordenadas_empresa').val()){
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("#btn_location_empresa").offset().top - ($(window).height()/2))
            }, 500);
            $("#btn_location_empresa").popover('show'); retorna=false;
        }

        //VALIDACION MULTI-INPUT TELEFONO PERSONAL
        /*else if($('div[name="telefono personal"][class="ctn-multiple"]').children().length==0){
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("#btn_guarda_telefono").offset().top - ($(window).height()/2))
            }, 500);
            $("#btn_guarda_telefono").popover('show'); retorna=false;
        }*/
        
        //VALIDACION MULTI-INPUT TELEFONO EMPRESA
        else if($('div[name="telefono empresa"][class="ctn-multiple"]').children().length==0){
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("#btn_guarda_telefono_empresa").offset().top - ($(window).height()/2))
            }, 500);
            $("#btn_guarda_telefono_empresa").popover('show'); retorna=false;
        }
        

        if(!retorna){
            $('#btncontinua1').popover('toggle');
            $("button[aria-controls='colapsito'][aria-expanded='true']").popover('show');
        }

        return retorna;
    }

    //HACE LAS VALIDACIONES NECESARIAS EN LA PRIMERA PESTAÑA
    function validaReferencias(){
        var retorna=true;
        //si no ha guardado referencia bancaria, la guarda
        if($('#institucion_financiera').val() && $('#tipocuenta').val()!=="Seleccione..." && $('#numerocuenta').val()){
            $("#btn_guarda_cuenta").trigger("click");
        }

        if(!$('#nombre_tarjeta').val()){ $('#nombre_tarjeta')[0].reportValidity(); retorna=false;}
        else if(!$('#direccion_estado_cuenta').val()){ $('#direccion_estado_cuenta')[0].reportValidity(); retorna=false;}

        //VALIDACION MULTI-INPUT REFERENCIA BANCARIA
        else if($('#multiper-list').children().length==0){
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("#btn_guarda_cuenta").offset().top - ($(window).height()/2))
            }, 500);
            $("#btn_guarda_cuenta").popover('show'); retorna=false;
        }

        //VALIDAMOS MULTI-INPUT-TABLE REFERENCIA PERSONAL
        else if($('#ctn-multi-table-count').text()<2){
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("#btn_add_pariente").offset().top - ($(window).height()/2))
            }, 500);
            $("#btn_add_pariente").popover('show'); retorna=false;
        }
        

        if(!retorna){
            $('#btncontinua3').popover('toggle');
            $("button[aria-controls='colapsito2'][aria-expanded='true']").popover('show');
        }

        return retorna;
    }


    //PERMITE MOSTRAR LOS ACORDIONES COLAPSADOS
    $('#colapsito').on('show.bs.collapse', function () {
        $('#colapsito1').collapse('hide');
        $('#colapsito2').collapse('hide');
        $('#colapsito3').collapse('hide');
        $("button[aria-controls='colapsito1']").removeClass("btn-success").addClass("btn-secondary");
        $("button[aria-controls='colapsito2']").removeClass("btn-success").addClass("btn-secondary");
        $("button[aria-controls='colapsito3']").removeClass("btn-success").addClass("btn-secondary");
    });
    $('#colapsito1').on('show.bs.collapse', function () {
        $('#colapsito').collapse('hide');
        $('#colapsito2').collapse('hide');
        $('#colapsito3').collapse('hide');
        $("button[aria-controls='colapsito1']").removeClass("btn-secondary").addClass("btn-success");
    });
    $('#colapsito2').on('show.bs.collapse', function () {
        $('#colapsito').collapse('hide');
        $('#colapsito1').collapse('hide');
        $('#colapsito3').collapse('hide');
        $("button[aria-controls='colapsito1']").removeClass("btn-secondary").addClass("btn-success");
        $("button[aria-controls='colapsito2']").removeClass("btn-secondary").addClass("btn-success");
    });
    $('#colapsito3').on('show.bs.collapse', function () {
        $('#colapsito').collapse('hide');
        $('#colapsito1').collapse('hide');
        $('#colapsito2').collapse('hide');
        $("button[aria-controls='colapsito1']").removeClass("btn-secondary").addClass("btn-success");
        $("button[aria-controls='colapsito2']").removeClass("btn-secondary").addClass("btn-success");
        $("button[aria-controls='colapsito3']").removeClass("btn-secondary").addClass("btn-success");
    });

    /*
    $('.nacionalidad').select2({
        placeholder: 'Seleccione Nacionalidad',
        allowClear: true
    });
    $('#nacionalidad').val( ($('#identificacion').val()===""?null:$('#nacionalidad').val()) ).trigger('change');
    $('.nacionalidad_conyugue').select2({
        placeholder: 'Seleccione Nacionalidad',
        allowClear: true
    });
    $('#nacionalidad_conyugue').val( ($('#identificacion').val()===""?null:$('#nacionalidad_conyugue').val()) ).trigger('change');*/

    $('.ciudad').select2({
        placeholder: 'Seleccione Ciudad',
        allowClear: true
    });
    $('#ciudad').val( ($('#identificacion').val()===""?null:$('#ciudad').val()) ).trigger('change');

    $('.ciudad_empresa').select2({
        placeholder: 'Seleccione Ciudad',
        allowClear: true
    });
    $('#ciudad_empresa').val( ($('#identificacion').val()===""?null:$('#ciudad_empresa').val()) ).trigger('change');
    

   $('.ciudad_pariente').select2({
        placeholder: 'Seleccione Ciudad',
        allowClear: true
    });
    $('#ciudad_pariente').val( ($('#identificacion').val()===""?null:$('#ciudad_pariente').val()) ).trigger('change');
    
    $('.institucion_financiera').select2({
        placeholder: 'Seleccione Institución Financiera',
        allowClear: true
    });
    $('#institucion_financiera').val( ($('#identificacion').val()===""?null:$('#institucion_financiera').val()) ).trigger('change');

    $('.actividad_empresa').select2({
        placeholder: 'Seleccione Actividad',
        allowClear: true
    });
    $('#actividad_empresa').val( ($('#identificacion').val()===""?null:$('#actividad_empresa').val()) ).trigger('change');

    $('.profesion').select2({
        placeholder: 'Seleccione Profesion',
        allowClear: true
    });
    $('#profesion').val( ($('#identificacion').val()===""?null:$('#profesion').val()) ).trigger('change');


    var myTimer = setInterval(function () {
        //console.log($(".sol-input-container").html());

        $(".select2-selection").css({
            'height': '37px',
            'padding-top': '4px',
            'margin-top': '0px'
        });
        $(".select2-selection__arrow").css({
            'margin-top': '6px'
        });
        if(!$('#identificacion').val)
            $('#identificacion').focus();


        clearInterval(myTimer);
    }, 50);
});
$('#fomrsend').on('keyup keypress', function(e) {//cancelamos que al dar enter se guarde el formulario
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
        e.preventDefault();
        return false;
    }
});



/***********************************INICIA CODIGO CONSULTA CEDULA PERSONA**********************************/
//permite ejecutar consulta al pasar a otro elemento con el focus
$('#identificacion').on('focusout', function(e) {
    if($('#identificacion').val().length==10)
        callFunctionPersona();
    else
        $('#identificacion')[0].reportValidity(); //forza la validacion html5
});

$('#identificacion').on('keyup', function(e) {//cancelamos que al dar enter se guarde el formulario
    var keyCode = e.keyCode || e.which;
    if ($('#identificacion').val().length==10 && keyCode === 13) { 
        $('#nacionalidad').focus();
        e.preventDefault();
        return false;
    }else if (keyCode === 13){
        $('#identificacion')[0].reportValidity();
    }
});
$('#btn_consulta_identifiacion').click(function(event) {
    callFunctionPersona();
});
/***********************************FIN CODIGO CONSULTA CEDULA PERSONA**********************************/

/***********************************INICIA CODIGO CONSULTA CEDULA CONYUGUE**********************************/
$('#identificacion_conyugue').on('focusout', function(e) {
    if($('#identificacion_conyugue').val().length==10)
        callFunctionConyugue();
    else
        $('#identificacion_conyugue')[0].reportValidity(); //forza la validacion html5
});

$('#identificacion_conyugue').on('keyup', function(e) {//cancelamos que al dar enter se guarde el formulario
    var keyCode = e.keyCode || e.which;
    if ($('#identificacion_conyugue').val().length==10 && keyCode === 13) { 
        $('#nacionalidad_conyugue').focus();
        e.preventDefault();
        return false;
    }else if (keyCode === 13){
        $('#identificacion_conyugue')[0].reportValidity();
    }
});
$('#btn_consulta_identifiacion_conyugue').click(function(event) {
    callFunctionConyugue();
});
/***********************************FIN CODIGO CONSULTA CEDULA CONYUGUE**********************************/





//ESTO SIRVE PARA EL MODAL QUE LLEGA DESDE EL SERVIDOR CUANDO SE COMPLETA EL REGISTRO DE LA SOLICITUD FLASH ERROR LARAVEL
if($('#flash-overlay-modal')){
    $('#flash-overlay-modal').modal();
    $('#flash-overlay-modal').find(".modal-header").addClass("bg-success text-white text-left");
    $('#flash-overlay-modal').find(".modal-header").find("button[data-dismiss='modal']").html("<span aria-hidden='true'>&times;</span>");
    $('#flash-overlay-modal').find(".modal-header").find("button[data-dismiss='modal']").insertAfter($("#flash-overlay-modal").find('.modal-title'));
    $('#flash-overlay-modal').find(".modal-footer").find("button[data-dismiss='modal']").removeClass("btn-default").addClass("btn-outline-secondary");
    $('#flash-overlay-modal').find(".modal-footer").find("button[data-dismiss='modal']").text("Aceptar")
}

//ESTO DE AQUI EN ADELANTE SIRVE PARA AÑADIR AUTOMATICAMENTE LOS MULTIINPUTGROUP SI NO DIO CIC EN GUARDAR
/*$('#nombre_empresa').on('focusin', function(e) {
    if($('#tipo_telefono').val()!=="Seleccione..." && $('#tipo_telefono').val()){
        $("#btn_guarda_telefono").trigger("click");
    }
});*/

$('#usd_sueldo').on('focusin', function(e) {
    if($('#tipo_telefono_empresa').val()!=="Seleccione..." && $('#telefono_empresa').val()){
        $("#btn_guarda_telefono_empresa").trigger("click");
    }
});

$('#nombre_tarjeta').on('focusin', function(e) {
    if($('#institucion_financiera').val() && $('#tipocuenta').val()!=="Seleccione..." && $('#numerocuenta').val()){
        $("#btn_guarda_cuenta").trigger("click");
    }
});


/*$('#nacionalidad').on('change', function(e){
    if($("#nacionalidad option:selected").html() && $("#nacionalidad option:selected").html().toLowerCase()=="ecuatoriana"){ 
        $('#identificacion').attr('minlength','10');
        $('#identificacion').attr('maxlength','10');
        $('#identificacion').attr("onkeypress", 'soloNumeros(event);');
    }else{
        $('#identificacion').attr('minlength','2');
        $('#identificacion').attr('maxlength','30');
        $('#identificacion').removeAttr("onkeypress");
    }
    
    //permite buscar cuando se presiona enter
    $('#identificacion').on('keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if(keyCode === 13)
            $('#primern').focus();
    });
    
    if(!$("#nacionalidad option:selected").html())
        $('#identificacion').prop('disabled',true);
    else
        $('#identificacion').prop('disabled',false);
    $('#identificacion').focus();
});*/


function validaStadoCivil(){
    if($('#estado_civil').val()=="CASADO" || $('#estado_civil').val()=="EN UNION DE HECHO"){
        $('#identificacion_conyugue').prop('disabled',false);
        $('#nombres_conyugue').prop('disabled',false);
        $('#fecha_nacimiento_conyugue').prop('disabled',false);
        $('#sexo_conyugue').prop('disabled',false);
        $('#nacionalidad_conyugue').prop('disabled',false);
        $('#estado_civil_conyugue').prop('disabled',false);

        $("#div_conyugue").show('slow');
        $('#estado_civil_conyugue').val($('#estado_civil').val());
    }else{
        $('#identificacion_conyugue').prop('disabled',true);
        $('#nombres_conyugue').prop('disabled',true);
        $('#fecha_nacimiento_conyugue').prop('disabled',true);
        $('#sexo_conyugue').prop('disabled',true);
        $('#nacionalidad_conyugue').prop('disabled',true);
        $('#estado_civil_conyugue').prop('disabled',true);

        $("#div_conyugue").hide('slow');
        $('#estado_civil_conyugue').val(null);        
    }
}
validaStadoCivil();

$('#estado_civil').on('change', function(e){
    validaStadoCivil();
});


//CORRIGE PROBLEMA QUE CAUSA QUE AL VALIDAR NO SE MUESTRE POR EL NAVBAR
/************************INICIA CODIGO CORRECCION*********************/
var delay = 0;
var offset = 100;

document.addEventListener('invalid', function(e){
$(e.target).addClass("invalid");
$('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
}, true);
document.addEventListener('change', function(e){
$(e.target).removeClass("invalid")
}, true);
/************************FIN CODIGO CORRECCION*********************/


/************************INICIA CODIGO UBICACION*********************/
function initMap() {
    var myLatlng = {lat: -1.054723, lng: -80.4524903};

    var map = new google.maps.Map(
        document.getElementById('map'), {
            scrollwheel: true,
            zoom: 8, 
            center: myLatlng});
            

    var mapempresa = new google.maps.Map(
        document.getElementById('map_empresa'), {
            scrollwheel: true,
            zoom: 8, 
            center: myLatlng});


    $('#modalLocation').on('show.bs.modal', function (e) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                myLatlng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setZoom(13);
                map.setCenter(myLatlng);
            });
        } 
    });

    $('#modalLocationCompany').on('show.bs.modal', function (e) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                myLatlng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                mapempresa.setZoom(13);
                mapempresa.setCenter(myLatlng);
            });
        } 
    });

    // Create the initial InfoWindow.
    var infoWindow = new google.maps.InfoWindow(
        {content: 'Clic sobre el mapa para seleccionar su ubicación!', position: myLatlng});
    //infoWindow.open(map);

    // Configure the click listener.
    map.addListener('click', function(mapsMouseEvent) {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
        infoWindow.setContent(mapsMouseEvent.latLng.toString());
        infoWindow.open(map);
        $("#info_ubication").text(mapsMouseEvent.latLng.toString().replace("(","").replace(")",""));
    });

    mapempresa.addListener('click', function(mapsMouseEvent) {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
        infoWindow.setContent(mapsMouseEvent.latLng.toString());
        infoWindow.open(mapempresa);
        $("#info_ubication_empresa").text(mapsMouseEvent.latLng.toString().replace("(","").replace(")",""));
    });
}

$("#save_ubication").on("click", function(){
    if($("#info_ubication").text()=="ninguna"){
        alert("No ha seleccionado la ubicación");
    }else{
        $("#coordenadas").val($("#info_ubication").text());
        $('#modalLocation').modal('hide');
    }
});
$("#save_ubication_empresa").on("click", function(){
    if($("#info_ubication_empresa").text()=="ninguna"){
        console.log("error");
        alert("No ha seleccionado la ubicación");
    }else{
        console.log("error");
        $("#coordenadas_empresa").val($("#info_ubication_empresa").text());
        $('#modalLocationCompany').modal('hide');
    }
});
/************************FIN CODIGO UBICACION*********************/

/************************INICIA CODIGO CONSULTA CEDULA PERSONA*********************/
function ejecutaConsultaPersona(urlroute){
    //ejecutar consulta en el servicio interno (valida que no se haya consultado para que no vuelva a consultar)
    if(!$('#segundon').val() && !$('#primern').val() && !$('#segundoa').val() && !$('#primera').val() && !$('#nacionalidad').val()){
        $("#loading").show();
        $.ajax({
            url: urlroute + "/" +$('#identificacion').val(),
            headers: {
                'apikey': 'key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBBBCM',
            },
            success: function(data) { 
                if(!data[0]){
                    $('#errorModal').find(".modal-body").text("Error: Consultando cedula");
                    $('#errorModal').on('hidden.bs.modal', function (e) {
                        $('#errorModal').find(".modal-body").text("");
                        $('#errorModal').off('hidden.bs.modal');
                        $("#identificacion").focus();
                    });
                    $("#identificacion").val("");
                    $('#errorModal').modal('show');
                    return;
                }
                if(data[0].error!==""){
                    $('#errorModal').find(".modal-body").text(data[0].error);
                    $('#errorModal').on('hidden.bs.modal', function (e) {
                        $('#errorModal').find(".modal-body").text("");
                        $('#errorModal').off('hidden.bs.modal');
                        $("#identificacion").focus();
                    });
                    $("#identificacion").val("");
                    $('#errorModal').modal('show');
                }else{
                    //nacionalidad
                    //$('#nacionalidad').val(7).trigger('change');
                    //nombres y apellidos
                    var names = data[0].name.split(" ");
                    $('#primera').val(names[0]);
                    $('#segundoa').val(names[1]);
                    $('#primern').val(names[2]);
                    $('#segundon').val(names[3]?names[3]:"");
                    $('#nacionalidad').val(data[0].nationality);
                    //fecha de nacimiento
                    var dateVal = data[0].dob.substring(6,10) + "-" + data[0].dob.substring(3,5) + "-" + data[0].dob.substring(0,2);
                    $('#fecha_nacimiento').val(dateVal);
                    //sexo
                    $('#sexo').val(data[0].genre).trigger('change');
                    //estado civil
                    $('#estado_civil').val(data[0].civilstate).trigger('change');
                    //direccion
                    $('#direccion_primaria').val(data[0].streets);
                    $('#nacionalidad').focus();
                }
                $("#loading").hide();
            },
            error: function() { alert('Error de consulta'); $("#loading").hide(); }
        });
    }else{
        alert("Sus datos ya han sido consultados");
    }
}
/************************FIN CODIGO CONSULTA CEDULA PERSONA*********************/

/************************INICIA CODIGO CONSULTA CEDULA CONYUGUE*********************/
function ejecutaConsultaConyugue(urlroute){
    //ejecutar consulta primero a la base de datos nuestra si no existe consultar en el registro civil si es ecuatoriano
    if(!$('#nombres_conyugue').val() && !$('#nacionalidad_conyugue').val()){
        $("#loading_conyugue").show();
        $.ajax({
            url: urlroute + "/" +$('#identificacion_conyugue').val(),
            headers: {
                'apikey': 'key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBBBCM',
            },
            success: function(data) { 
                if(!data[0]){
                    $('#errorModal').find(".modal-body").text("Error: Consultando cedula");
                    $('#errorModal').on('hidden.bs.modal', function (e) {
                        $('#errorModal').find(".modal-body").text("");
                        $('#errorModal').off('hidden.bs.modal');
                        $("#identificacion_conyugue").focus();
                    });
                    $("#identificacion_conyugue").val("");
                    $('#errorModal').modal('show');
                    return;
                }
                if(data[0].error!==""){
                    $('#errorModal').find(".modal-body").text(data[0].error);
                    $('#errorModal').on('hidden.bs.modal', function (e) {
                        $('#errorModal').find(".modal-body").text("");
                        $('#errorModal').off('hidden.bs.modal');
                        $("#identificacion_conyugue").focus();
                    });
                    $("#identificacion_conyugue").val("");
                    $('#errorModal').modal('show');
                }else{
                    $('#nombres_conyugue').val(data[0].name);
                    $('#nacionalidad_conyugue').val(data[0].nationality);
                    //fecha de nacimiento
                    var dateVal = data[0].dob.substring(6,10) + "-" + data[0].dob.substring(3,5) + "-" + data[0].dob.substring(0,2);
                    $('#fecha_nacimiento_conyugue').val(dateVal);
                    //sexo
                    $('#sexo_conyugue').val(data[0].genre).trigger('change'); 
                    $('#nombres_conyugue').focus();
                }
                $("#loading_conyugue").hide();
            },
            error: function() { alert('Error de consulta'); $("#loading").hide();}
        });
    }else{
        alert("Sus datos ya han sido consultados");
    }
}
/************************FIN CODIGO CONSULTA CEDULA CONYUGUE*********************/





/************************INICIA CODIGO API CIUDADES Y PROVINCIAS*********************/
/*function aplicaScriptCiudad(urlroute){
    $.ajax({
        url: urlroute,
        success: function(result) { 
            var array=Object.entries(result);
            var index=0;
            var obj = [];
            array.forEach((prov) => {
                var array=Object.entries(prov[1].cantones);
                array.forEach((city) => {
                    obj[index] = {id:city[0], text:(city[1].canton + " (" +prov[1].provincia + ")")};
                    index++;
                });
            });
            aplicaselect2("ciudad","Ciudad",obj);
            aplicaselect2("ciudad_empresa","Ciudad",obj);
            aplicaselect2("ciudad_pariente","Ciudad",obj);
        },
        error: function() { alert('Error de consulta');}
    });

    function aplicaselect2(id, nombre,datos){
        $('.' + id).select2({
            placeholder: 'Seleccione ' +nombre,
            allowClear: true,
            data: datos
        });
        $('#' + id).val( ($('#identificacion').val()===""?null:$('#' + id).val()) ).trigger('change');
        var myTimer = setInterval(function () {
            $(".select2-selection").css({
                'height': '37px',
                'padding-top': '4px',
                'margin-top': '0px'
            });
            $(".select2-selection__arrow").css({
                'margin-top': '6px'
            });
            clearInterval(myTimer);
        }, 50);
    }
}*/
/************************FIN CODIGO API CIUDADES Y PROVINCIAS*********************/
/*
$('#nacionalidad_conyugue').on('change', function(e){
    if($("#nacionalidad_conyugue option:selected").html() && $("#nacionalidad_conyugue option:selected").html().toLowerCase()=="ecuatoriana"){ 
        $('#identificacion_conyugue').attr('minlength','10');
        $('#identificacion_conyugue').attr('maxlength','10');
        $('#identificacion_conyugue').attr("onkeypress", 'soloNumeros(event);');
    }else{
        $('#identificacion_conyugue').attr('minlength','2');
        $('#identificacion_conyugue').attr('maxlength','30');
        $('#identificacion_conyugue').removeAttr("onkeypress");
    }
    
    //permite buscar cuando se presiona enter
    $('#identificacion_conyugue').on('keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if(keyCode === 13)
            $('#nombres_conyugue').focus();
    });
    
    if(!$("#nacionalidad_conyugue option:selected").html())
        $('#identificacion_conyugue').prop('disabled',true);
    else
        $('#identificacion_conyugue').prop('disabled',false);
    $('#identificacion_conyugue').focus();
});
*/


