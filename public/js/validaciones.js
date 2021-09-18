/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
function soloNumeros(e){
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
        e.preventDefault();
    }
}

function soloNumerosFloat(e){
    var key = window.event ? e.which : e.keyCode;
    if (key < 46 || key > 57) 
        e.preventDefault();
    if($(e.target).val().indexOf(".")>0 && key==46)
        e.preventDefault();
}

function SoloLetrasSinenie(e)
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    especiales = "32";//8-

    tecla_especial = false;

    for(var i in especiales.split("-")){
        if(key == especiales.split("-")[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        e.preventDefault();
    }

}

function SoloLetras(e)
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚáéíóú";
    especiales = "32";//8-

    tecla_especial = false;

    for(var i in especiales.split("-")){
        if(key == especiales.split("-")[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        e.preventDefault();
    }

}