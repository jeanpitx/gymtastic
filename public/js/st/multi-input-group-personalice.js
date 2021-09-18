/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
$(document).ready(function(){
    //verifica si es recarga de pagina o carga
    if($('#identificacion').val().trim().length>0){
        if(localStorage.getItem("multi-financiera")!=null){
            $("#multiper-list").append(localStorage.getItem("multi-financiera"));
            if($("#multiper-list > div").length>0)
                $("#informativetext").show();
        }
    }else{
        localStorage.clear();
    }
});

function keyAddPer(e, el){
    if (e.keyCode == 13) {
        actionAddPer();
    }
}

function actionAddPer(){
    //obtenemos cuantos div hay dentro del que se visualiza
    var contenedor=$("#multiper-list");
    var valhtmlreplace="";

    var status=false;

    //validaciones
    if(!$('#institucion_financiera').val()){
        alert("campo Institucion financiera es obligatorio");
        $('#institucion_financiera').focus();
        return false;
    }else if(!$('#tipocuenta').val() || $('#tipocuenta').val()=="Seleccione..."){
        alert("campo Tipo de cuenta es obligatorio");
        $('#tipocuenta').focus();
        return false;
    }else if(!$('#numerocuenta').val()){
        alert("campo Numero de cuenta es obligatorio");
        $('#numerocuenta').focus();
        return false;
    }

    //si pasa validaciones y añadimos los 3 elementos que queremos
    /*valhtmlreplace+='<input value="'+$('#institucion_financiera').find('option:selected').text()+'" class="form-control ctn-multiple-norepeat" readonly="true" name="institucion_financiera_add[]" type="text">';
    valhtmlreplace+='<input value="'+$('#tipocuenta').find('option:selected').text()+'" class="form-control ctn-multiple-norepeat" readonly="true" name="tipocuenta_add[]" type="text">';*/
    valhtmlreplace+='<input value="'+$('#institucion_financiera').find('option:selected').text()+'" class="form-control" type="text" disabled>';
    valhtmlreplace+='<input value="'+$('#institucion_financiera').val()+'" class="form-control ctn-multiple-norepeat" name="institucion_financiera_add[]" type="text" style="display:none">';

    valhtmlreplace+='<input value="'+$('#tipocuenta').find('option:selected').text()+'" class="form-control ctn-multiple-norepeat" readonly="true" name="tipocuenta_add[]" type="text">';
    
    valhtmlreplace+='<input value="'+$('#numerocuenta').val()+'" class="form-control ctn-multiple-norepeat" readonly="true" name="numerocuenta_add[]" type="text">';

    //vaciamos los elementos
    $('#numerocuenta').val("");
    $('#institucion_financiera').val("").change();
    $('#tipocuenta').val("");
       
    var htmlnew='<div class="coinput input-group input-group-sm" style="margin-bottom:2px">'+
                    '<div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>' +
                    '$$$replace$$$' +
                    '<div class="input-group-append">' +
                        '<button class="btn btn-outline-danger" type="button" onclick="actionRmvPer(this)">-</button>' +
                    '</div>' +
                '</div>';

    htmlnew=htmlnew.replace("$$$replace$$$",valhtmlreplace);

    if(contenedor.children().length==3){
        status=true;
        alert("No puede ingresar mas de 3 valores");
    }

    //validamos que no se repita
    contenedor.children().each(function(i,elm){
        if($(elm).html()===$(htmlnew).html()){
            alert("Este dato ya se encuentra registrado");
            status=true;
            return false;
        }
    });

    if(status==true) return;//salimos

    contenedor.append(htmlnew);

    localStorage.setItem("multi-financiera",contenedor.html());
    

    if($("#multiper-list > div").length>0)
        $("#informativetext").show();

}
function actionRmvPer(el){
    var contenedor=$("#multiper-list");
    $($(el).parent().parent()).remove();
    localStorage.setItem("multi-financiera",contenedor.html());
    if($("#multiper-list > div").length==0)
        $("#informativetext").hide();
}