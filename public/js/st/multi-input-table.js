/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
$(document).ready(function() {
    var counter = 0;
    var isupdate = false;
    var isOkPressed = false;
    //verifica si es recarga de pagina o carga
    if($('#identificacion').val().trim().length>0){
        if (localStorage.getItem("tbl-pariente")) {
            $("#tbl-pariente").html(localStorage.getItem("tbl-pariente"));
            counter = $("#tbl-pariente tr").length - 1;
            $('#ctn-multi-table-count').html(counter);
        }
    } else {
        localStorage.clear();
    }

    //funciones del boton añadir
    $("#addrow").on("click", function() {
        isupdate = false;
        isOkPressed = true;
        $('#calcelrow').show(); //mostramos boton cancelar en add
        var status = false;
        if ($("#tbl-pariente tr:last").attr("data") == "temp") {
            $("#tbl-pariente tr:last").remove();
        }

        var newRow = $("<tr>");
        var cols = "";
        $('.ctn-multi-table-modal input,.ctn-multi-table-modal select').each(function(i, elm) {
            if ($(elm).val() == "") { //valida que los datos sean ingresados
                alert("El campo " + $(elm).attr("name") + " está vacio");
                status = true;
                return false;
            }

            if ($(elm).prop('nodeName').toLowerCase() === "input") {
                cols += '<td>' + $(elm).val().toUpperCase() + '<input value="'+$(elm).val().toUpperCase()+'" type="text" class="form-control" name="' + $(elm).attr("name") + '_add[]"/></td>';
            } else {
                //cols += '<td>' + $(elm).find('option:selected').text() + '<input value="'+$(elm).find('option:selected').text()+'" type="text" class="form-control" name="' + $(elm).attr("name")  + '_add[]"/></td>';
                cols += '<td>' + $(elm).find('option:selected').text().toUpperCase() + '<input value="'+$(elm).val().toUpperCase()+'" type="text" class="form-control" name="' + $(elm).attr("name")  + '_add[]"/></td>';
            }
        });
        if (status == true) return; //salimos


        //añadimos el boton de eliminar y modificar
        cols += '<td>'
        cols += '<button type="button" class="ibtnMdf btn btn-sm" title="Editar"><i class="fa fa-edit" style="font-size: 10px; color:#17a2b8"/></button>';
        cols += '<button type="button" class="ibtnDel btn btn-sm"title="Eliminar"><i class="fa fa-trash" style="font-size: 10px; color:red"/></button>';
        //cols += '<button style="margin-left:2px" type="button" class="ibtnMdf btn btn-sm btn-warning"><i class="fa fa-pencil"/></button>';
        //cols += '<button type="button" class="ibtnDel btn btn-sm btn-danger"><i class="fa fa-trash"/></button>'
        cols += '</td>'

        newRow.append(cols);
        $("#tbl-pariente").append(newRow);
        $('#modalTable').modal('hide');
        counter++;
        //volvemos los datos como estaban al principio
        $('#ciudad_pariente').val(null).trigger('change');
        $('#tipotele_pariente').val(null);

        //LIMPIAMOS LOS CAMPOS DE TEXTO
        $('.ctn-multi-table-modal input,.ctn-multi-table-modal select').each(function(i, elm) {
            if ($(elm).prop('nodeName').toLowerCase() === "input") {
                $(elm).val("");
            }
        });


        $('#ctn-multi-table-count').html(counter);
        localStorage.setItem("tbl-pariente", $("#tbl-pariente").html());
    });

    $("#tbl-pariente").on("click", ".ibtnDel", function(event) {
        $(this).closest("tr").remove();
        counter -= 1
        $('#ctn-multi-table-count').html(counter);
        localStorage.setItem("tbl-pariente", $("#tbl-pariente").html());
    });

    $("#tbl-pariente").on("click", ".ibtnMdf", function(event) {
        isupdate = true;
        $('#calcelrow').hide();
        //llenamos los campos con los campos de  esta lista
        var tr = $(this).closest("tr");
        $('.ctn-multi-table-modal input,.ctn-multi-table-modal select').each(function(i, elm) {
            if ($(elm).prop('nodeName').toLowerCase() === "input") {
                $(elm).val($(tr).children().eq(i).text());
            } else {
                $(elm).find($(tr).children().eq(i).text()).attr("selected", "selected");
            }
        });
        $('#modalTable').modal('show');

        $(this).closest("tr").remove();
        counter -= 1
        $('#ctn-multi-table-count').html(counter);
        localStorage.setItem("tbl-pariente", $("#tbl-pariente").html());
    });

    $('#modalTable').on('hidden.bs.modal', function(e) {
        if (isupdate && !isOkPressed) {
            $("#addrow").trigger("click");
        }
    });
    $('#modalTable').on('show.bs.modal', function(e) {
        isOkPressed = false;
    });
});

/*function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();
}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}*/