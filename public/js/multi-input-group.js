/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
$(document).ready(function(){
    $(".ctn-multiple-btn").attr('onclick', 'actionAdd(this)');
    var key=$(".ctn-multiple-key");
    key.attr('onkeypress',  'keyAdd(event,this);'); //($(key).attr('onkeypress')?$(key).attr('onkeypress'):"") +
});

function keyAdd(e, el){
    if (e.keyCode == 13) {
        var btn=$(el).closest(".form-group").find(".ctn-multiple-btn");
        actionAdd(btn);
        e.preventDefault();
    }
}


function actionAdd(el){
    //obtenemos cuantos div hay dentro del que se visualiza
    var contenedor=$(el).closest(".form-group").find(".ctn-multiple");
    var contenedorresul=$(el).closest(".form-group").find(".ctn-multiple-content");
    var types="select,input";
    var valhtmlreplace="";

    var status=false;
    //validamos que no hayan datos vacios en los textos que se ingresan
    var nuevo=""
    contenedor.find("input[type=text], select").each(function(i,elm){
        if(types.includes($(elm).prop('nodeName').toLowerCase())){
            if(!$(elm).attr("class").includes("ctn-multiple-norequired") && ($(elm).val()=="" || $(elm).val()=="Seleccione...")){
                $(elm).focus();
                alert("El campo "+$(elm).attr("name")+" está vacio");
                status=true;
                return false;
            }

            var txtview=($(elm).prop('nodeName').toLowerCase()=="select"? //obtiene etiqueta
            $(elm).find('option:selected').text():
            $(elm).val());

            var norepeat="";
            if($(elm).attr("class").includes("ctn-multiple-norepeat")){
                nuevo+=$(elm).val();
                var norepeat=" ctn-multiple-norepeat";
            }

            if($(elm).prop('nodeName').toLowerCase()=="select"){ //<input value="'+$(elm).val()+'" class="form-control' + norepeat + '" name="'+$(elm).attr("name")+'_add[]" type="text">
                var select='<select class="custom-select' + norepeat + '" name="'+$(elm).attr("name")+'_add[]">'+$(elm).html().replace('selected="selected"','')+'</select>';
                //select=$(select).val($(elm).val()).prop('selected', true); //.change();
                select=$(select);
                select.find('option[value='+$(elm).val()+']').attr('selected','selected');
                valhtmlreplace+=select[0].outerHTML;
            }else
                valhtmlreplace+='<input value="'+txtview+'" class="form-control' + norepeat + '" name="'+$(elm).attr("name")+'_add[]" type="text">';
        }
    });

    if(status==true) return;//salimos

    
    if(contenedor.children().length>contenedor.attr("data-multiple-max")){
        alert("No se puede añadir mas de 5 elementos");
        status=true;
    }

    //validamos que no se repita
    contenedorresul.children().each(function(i,elm){
        var existente="";
        //por cada elemento en el contenedor lo concatenamos para compararlo con los insertados
        $(elm).find("input[type=text], select").each(function(i,elm2){
            //console.log($(elm2).attr("class"));
            if($(elm2).attr("class").includes("ctn-multiple-norepeat")){
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
    contenedor.find("input[type=text], select").each(function(i,elm){
        if(types.includes($(elm).prop('nodeName').toLowerCase())){
            if($(elm).prop('nodeName').toLowerCase()!="select"){
                $(elm).val("");
            }else{
                $(elm).val("");
            }
        }
    });

    
    var htmlnew='<li class="coinput input-group input-group-sm dropzone" style="margin-bottom:2px" draggable="true">'+
                    '<div class="input-group-prepend"><i class="input-group-text fas fa-arrows-alt"></i></div>' +
                    '$$$replace$$$' +
                    '<div class="input-group-append">' +
                        '<button class="btn btn-outline-danger" type="button" onclick="actionRmv(this)">-</button>' +
                    '</div>' +
                '</li>';
    

    contenedorresul.append(htmlnew.replace("$$$replace$$$",valhtmlreplace));

    localStorage.setItem(contenedor.attr("name"),contenedor.html());
    executeMoveElemnts();
}

function actionRmv(el){
    var contenedor=$(el).parent().parent().parent();
    var size=contenedor.children().length-1;
    $($(el).parent().parent()).remove();
    if(size===0){
        contenedor.css("margin-bottom", "0px");
    }
    localStorage.setItem(contenedor.attr("name"),contenedor.html());
    executeMoveElemnts();
}


//PERMITE MOVER LOS ELEMENTOS
function executeMoveElemnts() {

    var dragSrcEl = null;

    function handleDragStart(e) {
        this.style.opacity = '0.4';

        dragSrcEl = this;

        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    }


    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }

        e.dataTransfer.dropEffect = 'move';

        return false;
    }

    function handleDragEnter(e) {
        this.classList.add('over');
    }

    function handleDragLeave(e) {
        this.classList.remove('over');
    }

    function handleDrop(e) {
        if (e.stopPropagation) {
            e.stopPropagation(); // stops the browser from redirecting.
        }

        if (dragSrcEl!== null && dragSrcEl !== this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }

        return false;
    }

    function handleDragEnd(e) {
        this.style.opacity = '1';
        
        items.forEach(function (item) {
        item.classList.remove('over');
        });
    }


    let items = document.querySelectorAll('.content-move .dropzone');
    items.forEach(function(item) {
        item.addEventListener('dragstart', handleDragStart, false);
        item.addEventListener('dragenter', handleDragEnter, false);
        item.addEventListener('dragover', handleDragOver, false);
        item.addEventListener('dragleave', handleDragLeave, false);
        item.addEventListener('drop', handleDrop, false);
        item.addEventListener('dragend', handleDragEnd, false);
    });
};

executeMoveElemnts();
$('.content-move input').on("click", function (e){
    $(this)[0].setSelectionRange(0, $(this).val().length);
});