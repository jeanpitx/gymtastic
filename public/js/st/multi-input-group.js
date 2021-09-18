/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
$(document).ready(function(){
    //añadimos el onclick y el onkey
    $('.ctn-multiple').each(function(i,elm){
        //añadimos al boton
        var btn=$(elm).parent().children().eq(2).find('.ctn-multiple-btn').children().eq(0);
        $(btn).attr('onclick', 'actionAdd(this)');
        //añadimos el evento de presionar texto
        var key=$(elm).parent().children().eq(2).find('.ctn-multiple-key');
        $(key).attr('onkeypress', ($(key).attr('onkeypress')?$(key).attr('onkeypress'):"") + ' keyAdd(event,this);');
    });
    //verifica si es recarga de pagina o carga
    if($('#identificacion').val().trim().length>0){
        $('.ctn-multiple').each(function(i,elm){
            if(localStorage.getItem($(elm).attr("name"))!=null){
                $(elm).append(localStorage.getItem($(elm).attr("name")));
                $(elm).css("margin-bottom", "5px");
            }
        });
    }else{
        localStorage.clear();
    }
});

function keyAdd(e, el){
    if (e.keyCode == 13) {
        var btn=$(el).parent().find(".ctn-multiple-btn").children();
        actionAdd(btn);
    }
}


function actionAdd(el){
    //obtenemos cuantos div hay dentro del que se visualiza
    var contenedor=$(el).parent().parent().parent().children().eq(1);
    var types="select,input";
    var valhtmlreplace="";
    contenedor.css("margin-bottom", "5px");

    var status=false;
    //validamos que no hayan datos vacios en los textos que se ingresan
    var nuevo=""
    $(el).parent().parent().children().each(function(i,elm){
        if(types.includes($(elm).prop('nodeName').toLowerCase())){
            if(!$(elm).attr("class").includes("ctn-multiple-norequired") && ($(elm).val()=="" || $(elm).val()=="Seleccione...")){
                $(elm).focus();
                alert("El campo "+$(elm).attr("name")+" está vacio");
                status=true;
                return false;
            }

            /*var txtstore=($(elm).prop('nodeName').toLowerCase()=="select"? //obtiene etiqueta
            $(elm).val(): //$(elm).find('option:selected').text()
            $(elm).val());*/
            var txtview=($(elm).prop('nodeName').toLowerCase()=="select"? //obtiene etiqueta
            $(elm).find('option:selected').text():
            $(elm).val());

            //var txtnew=$(elm).val(); //obtiene valor
            if($(elm).attr("class").includes("ctn-multiple-norepeat")){
                nuevo+=$(elm).val();
                //añadimos el html nuevo
                //valhtmlreplace+='<input value="'+txtview+'" class="form-control" type="text" disabled>';
                //valhtmlreplace+='<input value="'+txtstore+'" class="form-control ctn-multiple-norepeat" name="'+$(elm).attr("id")+'_add[]" type="text" style="display:none">';
                valhtmlreplace+='<input value="'+txtview+'" class="form-control ctn-multiple-norepeat" name="'+$(elm).attr("id")+'_add[]" type="text" readonly="true">';
            }else{
                //valhtmlreplace+='<input value="'+txtview+'" class="form-control" type="text" disabled>';
                //valhtmlreplace+='<input value="'+txtstore+'" class="form-control" name="'+$(elm).attr("id")+'_add[]" type="text" style="display:none">';
                valhtmlreplace+='<input value="'+txtview+'" class="form-control" name="'+$(elm).attr("id")+'_add[]" type="text" readonly="true">';
            }
        }
    });

    if(status==true) return;//salimos

    
    if(contenedor.children().length>2){
        alert("No se puede añadir mas de 3 elementos");
        status=true;
    }

    //validamos que no se repita
    contenedor.children().each(function(i,elm){
        var existente="";
        //por cada elemento en el contenedor lo concatenamos para compararlo con los insertados
        $(elm).children().each(function(i,elm2){
            if(types.includes($(elm2).prop('nodeName').toLowerCase())
            && $(elm2).attr("class").includes("ctn-multiple-norepeat")){
                existente+=$(elm2).val();
            }
        });
        if(existente==nuevo && existente !="" && nuevo!=""){
            alert("Este dato ya se encuentra registrado");
            status=true;
            return false;
        }
    });
    if(status==true) return;//salimos

    //vaciamos los llenados
    $(el).parent().parent().children().each(function(i,elm){
        if(types.includes($(elm).prop('nodeName').toLowerCase())){
            if($(elm).prop('nodeName').toLowerCase()!="select"){
                $(elm).val("");
            }else{
                $(elm).val("");
            }
        }
    });

    
    var htmlnew='<div class="coinput input-group input-group-sm" style="margin-bottom:2px">'+
                    '<div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>' +
                    '$$$replace$$$' +
                    '<div class="input-group-append">' +
                        '<button class="btn btn-outline-danger" type="button" onclick="actionRmv(this)">-</button>' +
                    '</div>' +
                '</div>';
    

    contenedor.append(htmlnew.replace("$$$replace$$$",valhtmlreplace));

    localStorage.setItem(contenedor.attr("name"),contenedor.html());

}
function actionRmv(el){
    var contenedor=$(el).parent().parent().parent();
    var size=contenedor.children().length-1;
    $($(el).parent().parent()).remove();
    if(size===0){
        contenedor.css("margin-bottom", "0px");
    }
    localStorage.setItem(contenedor.attr("name"),contenedor.html());
}