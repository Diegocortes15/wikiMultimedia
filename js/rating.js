var calificacion = -1,
    IDu = 0,
    art = 0;
$(document).ready(function() {
    resetColor();
    if (localStorage.getItem('calificacion') != null)
        setstars(parseInt(localStorage.getItem('calificacion')));

    $('.fa-star').on('click', function() {
        calificacion = parseInt($(this).data('index'));
        localStorage.setItem('calificacion', calificacion);
        guardado();
    });

    $('.fa-star').mouseover(function() {
        resetColor();
        var Indexactual = parseInt($(this).data('index'));
        setstars(Indexactual);
    });
    $('.fa-star').mouseleave(function() {
        resetColor();
        if (calificacion != -1) {
            setstars(calificacion);
        }
    });

});

function guardado() {
    $.ajax({
        method: "POST",
        dataType: 'json',
        data: {
            save: 1,
            IDu: IDu,
            calificacion: calificacion,
        },
        success: function(r) {
            IDu = r.IDu;
        }
    });
}

function setstars(max) {

    for (var i = 0; i <= max; i++) {
        $('.fa-star:eq(' + i + ')').css('color', 'orange');
    }
}

function resetColor() {
    $('.fa-star').css('color', 'black')
}