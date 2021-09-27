/**
* Desarrollado por: Jean Pierre Meza Cevallos
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
**/

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

    $("#div_estudiante,#div_dependiente,#div_jubilado,#div_independiente").hide();
    $("#div_estudiante :input,#div_dependiente :input,#div_jubilado :input,#div_independiente :input").prop("disabled", true);
    switch ($("#ocupacion").val()) {
        case 'Estudiante': $("#div_estudiante :input").prop("disabled", false); $("#div_estudiante").show("slow"); break;
        case 'Dependiente': $("#div_dependiente :input").prop("disabled", false); $("#div_dependiente").show("slow"); break;
        case 'Jubilado': $("#div_jubilado :input").prop("disabled", false); $("#div_jubilado").show("slow"); break;
        case 'Persona Independiente': $("#div_independiente :input").prop("disabled", false); $("#div_independiente").show("slow"); break;
    }

    $('input').on('click', function(){
        if(!$("#identificacion").val())
            $('#identificacion').focus();
    });
    
    $("#ocupacion").on("change", function(e){
        $("#div_estudiante,#div_dependiente,#div_jubilado,#div_independiente").hide();
        $("#div_estudiante :input,#div_dependiente :input,#div_jubilado :input,#div_independiente :input").prop("disabled", true);
        switch (e.target.value) {
            case 'Estudiante': $("#div_estudiante :input").prop("disabled", false); $("#div_estudiante").show("slow"); break;
            case 'Dependiente': $("#div_dependiente :input").prop("disabled", false); $("#div_dependiente").show("slow"); break;
            case 'Jubilado': $("#div_jubilado :input").prop("disabled", false); $("#div_jubilado").show("slow"); break;
            case 'Persona Independiente': $("#div_independiente :input").prop("disabled", false); $("#div_independiente").show("slow"); break;
        }
    });

    $(".toupper").on('keyup',function(e){
        $(e.target).val($(e.target).val().toUpperCase());
    });

    //VALIDA Y EVITA QUE SE OCULTE TODOS LOS COLLAPSES
    $("button[aria-controls='colapsito']").on("click", function(e){
        if($('#colapsito').hasClass("show"))
            e.stopPropagation();
    });
    $("#btnsave").on("click", function(e){
        if(!validaPersonales()){ console.log("stop"); e.stopPropagation(); e.preventDefault(); return;}
    });

    //OCULTA TODAS LAS ALERTAS BOOTSTRAP CUANDO HAY ERRORES DE VALIDACION HTML
    $("button[aria-controls='colapsito']").popover('hide');
    $("#btn_location_persona").popover('hide');
    $(".btn_location_empresa").popover('hide');
    $("#btnsave").popover('hide');
    $('body').on("click", function(){
        $("button[aria-controls='colapsito']").popover('hide');
        $("#btn_location_persona").popover('hide');
        $(".btn_location_empresa").popover('hide');
        $("#btnsave").popover('hide');
    });

    //HACE LAS VALIDACIONES NECESARIAS EN LA PRIMERA PESTAÑA
    function validaPersonales(){
        var retorna=true;
        if(!$('#identificacion').val()){ $('#identificacion')[0].reportValidity(); retorna=false;}
        else if(!$('#nacionalidad').val()){ $('#nacionalidad')[0].reportValidity(); retorna=false;}
        else if(!$('#nombres_completos').val()){ $('#nombres_completos')[0].reportValidity(); retorna=false;}
        else if(!$('#fecha_nacimiento').val()){ $('#fecha_nacimiento')[0].reportValidity(); retorna=false;}
        else if(!$('#ciudad').val()){ $('#ciudad')[0].reportValidity(); retorna=false;} //SELECT2
        else if(!$('#email').val()){ $('#email')[0].reportValidity(); retorna=false;}
        else if(!$('#telefono').val()){ $('#telefono')[0].reportValidity(); retorna=false;}
    
        if(!retorna){
            $('#btnsave').popover('toggle');
            $("button[aria-controls='colapsito'][aria-expanded='true']").popover('show');
        }

        return retorna;
    }

    $('.ciudad').select2({
        placeholder: 'Seleccione Ciudad',
        allowClear: true
    });
    $('#ciudad').val( ($('#identificacion').val()===""?null:$('#ciudad').val()) ).trigger('change');

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


//ESTO SIRVE PARA EL MODAL QUE LLEGA DESDE EL SERVIDOR CUANDO SE COMPLETA EL REGISTRO DE LA SOLICITUD FLASH ERROR LARAVEL
if($('#flash-overlay-modal')){
    $('#flash-overlay-modal').modal();
    $('#flash-overlay-modal').find(".modal-header").addClass("bg-success text-white text-left");
    $('#flash-overlay-modal').find(".modal-header").find("button[data-dismiss='modal']").html("<span aria-hidden='true'>&times;</span>");
    $('#flash-overlay-modal').find(".modal-header").find("button[data-dismiss='modal']").insertAfter($("#flash-overlay-modal").find('.modal-title'));
    $('#flash-overlay-modal').find(".modal-footer").find("button[data-dismiss='modal']").removeClass("btn-default").addClass("btn-outline-secondary");
    $('#flash-overlay-modal').find(".modal-footer").find("button[data-dismiss='modal']").text("Aceptar")
}


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
        $(".coordenadas_negocio:not(:disabled)").val("");
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
        alert("No ha seleccionado la ubicación");
    }else{
        $(".coordenadas_negocio:not(:disabled)").val($("#info_ubication_empresa").text());
        $('#modalLocationCompany').modal('hide');
    }
});
/************************FIN CODIGO UBICACION*********************/

