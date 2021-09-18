/**
 *Desarrollado por: Jean Meza Cevallos
 *JEAN PIERRE MEZA CEVALLOS
 *IN: in/jeanpitx
 *FB: jeanpitx
 *TW: jeanpitx
**/
$num = $('.ui-card').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

if ($num % 2 == 0) {
    $('.ui-card:nth-child(' + $even + ')').addClass('active');
    $('.ui-card:nth-child(' + $even + ')').prev().addClass('prev');
    $('.ui-card:nth-child(' + $even + ')').next().addClass('next');
} else {
    $('.ui-card:nth-child(' + $odd + ')').addClass('active');
    $('.ui-card:nth-child(' + $odd + ')').prev().addClass('prev');
    $('.ui-card:nth-child(' + $odd + ')').next().addClass('next');
}

$('.ui-card').click(function() {
    $slide = $('.active').width();
    //console.log($('.active').position().left);
    $id = $(this).attr("id");
    if ($id == 1) {
        $('#producto').val($id);
        $('#tarjeselect').text("Tarjeta Visa Nacional Seleccionada");
    } else if ($id == 2) {
        $('#producto').val($id);
        $('#tarjeselect').text("Tarjeta Clásica Seleccionada");
    } else {
        $('#producto').val($id);
        $('#tarjeselect').text("Tarjeta Oro Seleccionada");
    }
    $(this).removeClass('prev next');
    $(this).siblings().removeClass('prev active next');

    $(this).addClass('active');
    $(this).prevAll().addClass('prev');
    $(this).nextAll().addClass('next');
});
$('#producto').val(2);


// Keyboard nav
$('html body').keydown(function(e) {
    if (e.keyCode == 37) { // left
        $('.active').prev().trigger('click');
    } else if (e.keyCode == 39) { // right
        $('.active').next().trigger('click');
    }
});