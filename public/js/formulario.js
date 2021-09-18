/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
/********************************VISTA CARRUSEL*************************************/
//HABILITA EL ZOOM EN LAS IMAGENES CON LA CLASE IMG-ZOOMABLE
document.addEventListener('DOMContentLoaded', function () {
  new Zooming({ // https://desmonding.me/zooming/docs
    enableGrab:false, //deshabilita agarre y arrastre de la imagen
    bgColor: '#000',
	customSize: '120%',
	zIndex: 1500
  }).listen('.img-zoomable')
})

//MUESTRA LA IMAGEN CUANDO ES SELECCIONADA
$('#url_imagen').on('change',  function(evt) {
	var file = evt.target.files[0];//obtenemos solo el primer archivo
	//Solo admitimos imágenes.
	if (!file.type.match('image.*')) {
		return;
	}
	var reader = new FileReader();
	reader.onload = (function(theFile) {
		return function(e) {
			// Insertamos la imagen en la img con id=imgsee
			document.getElementById("imgsee").src = e.target.result;
			//llena el label de bootstrap con el nombre
			document.getElementsByClassName('custom-file-label')[0].innerHTML = escape(theFile.name);
			// Insertamos la imagen en la text con name=imghide
			$("input[name='imghide']").val(e.target.result);
		};
	})(file);
	reader.readAsDataURL(file);
});

$('#url_boton').on('change',  function(evt) {
	var file = evt.target.files[0];//obtenemos solo el primer archivo
	//Solo admitimos imágenes.
	if (!file.type.match('image.*')) {
		return;
	}
	var reader = new FileReader();
	reader.onload = (function(theFile) {
		return function(e) {
			// Insertamos la imagen en la img con id=imgsee
			document.getElementById("imgseebtn").src = e.target.result;
			//llena el label de bootstrap con el nombre
			$('label[for="url_boton"].custom-file-label').html(escape(theFile.name));
			// Insertamos la imagen en la text con name=imghide
			$("input[name='imghidebtn']").val(e.target.result);
		};
	})(file);
	reader.readAsDataURL(file);
});

//VALIDA QUE SI SE RECARGA LA PAGINA O TRAE ERRORES DE VALIDACION DEL SERVIDOR MUESTRE LA IMAGEN ENVIADA Y ESTA NO SE PIERDA
if($("input[name='imghide']").val()){
	document.getElementById("imgsee").src = $("input[name='imghide']").val();
	document.getElementsByClassName('custom-file-label')[0].innerHTML = 'Imagen Seleccionada';
}

//VALIDA LA URL Y EL BOTON PARA QUE SE ACTIVE SOLO SI HAY URL
$('#indicador_btn').click(function(event) {
	if($('#link').val()==""){
	    event.preventDefault();	
		$('#link').addClass("is-invalid");
		$('#msg_link').html("Debe ingresar una URL para habilitar el boton");
	}
});
//VALIDA LA URL Y EL BOTON PARA QUE SE ACTIVE SOLO SI HAY URL
$('#link').bind('input',function(event) {
	if($('#link').val()=="")$('#indicador_btn').prop('checked', false);
	$('#link').removeClass("is-invalid");
	$('#msg_link').html("");
});


//AYUDA A PREVISUALIZAR EL CARRUSEL AL CREAR O MODIFICAR
function previsualiza() {
	$('.carousel-inner').html("");
	$('.carousel-indicators').html("");
	for(var i=0;i < 2;i++) {
		var captions="<h5>" + $('#titulo').val() + "</h5><p>" + $('#descripcion').val() +"</p>";
		var target=($('#link').val()!="")?'target="_blank"':'';
		var href=($('#link').val()!="")?'href="'+$('#link').val()+'"':'';
		if ($('#indicador_btn').prop('checked')) captions+='<a '+href+' '+target+' class="btn btn-outline-light">Abrir Enlace</a>'
		$('<div class="carousel-item"><a '+href+' '+target+'><img src="'+document.getElementById("imgsee").src+'" class="d-block w-100"></a><div class="carousel-caption d-none d-md-block" style="opacity: 1"></div></div>').appendTo('.carousel-inner');
		$('<li data-target="#carouselPrincipal" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators') ;
		$('.carousel-caption:eq('+i+')');//.html(captions)
	}
    //MARCA COMO ACTIVO EL PRIMER ITEM
    $('.carousel-item').first().addClass('active');
    //MARCA COMO ACTIVO EL PRIMER indicators    
    $('.carousel-indicators > li').first().addClass('active');
    //ACTIVA Y CAMBIA EL INTERVALO DE TIEMPO DEL CARRUSEL
	$('.carousel').carousel({interval: 3000});
	$('#previsualiza').show({interval: 300});
}


$('.ipt-list').on("change", function(e){iptOnChange(e);});

function iptOnChange(event){
    var select=$(event.target);
    if(select.val()=="otra"){
        var respaldo=encodeURIComponent(select[0].outerHTML);
        select.closest(".input-group").find(".input-group-append").prepend('<button class="btn btn-secondary ipt-btn-list" type="button">Lista</button>');
        select.replaceWith('<input class="form-control ipt-list ctn-multiple-norepeat ctn-multiple-key tolower" onkeypress="keyAdd(event,this);" ipt-data-select="'+respaldo+'" placeholder="Enlace o Url" name="'+select.attr("name")+'" type="text">');
        
        $('.ipt-btn-list').on("click", function(e){
            var btn=$(e.target);
            var input=btn.closest(".input-group").find(".ipt-list");
            input.replaceWith(decodeURIComponent(input.attr("ipt-data-select")));
            btn.remove();
            $('.ipt-list').on("change", function(e){iptOnChange(e);});
        });
    }
}