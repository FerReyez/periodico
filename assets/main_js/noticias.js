$(document).on("ready", main);

function main() {
    var table = $('#tb-noticia').DataTable()
    table.destroy();
    table = $('#tb-noticia').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": host + "periodico/Controller_noticia/listar_noticia",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [-1],
            "orderable": false,
        },],
    });
}

$(document).on("click", "#add", function () {
    $("#carga").fadeOut("slow");
    $("#action").val("create");
    $(".form-line").removeClass("focused");
    $("#developer_cu_form")[0].reset();
    $("#form-title").text("Agregar Noticia");
    $("#nombreb").text("Agregar");
    $("#create_form_modal").modal("show");
});

$(document).on("submit", "#developer_cu_form", function (e) {
    e.preventDefault();
    var titulo = $("#titulo").val();
    var url_foto = $("#url_foto").val();
    var fotografo = $("#fotografo").val();
    var fecha = $("#fecha").val();
    var editor = $("#editor").val();
    var reportero = $("#reportero").val();
    var categoria = $("#categoria").val();
    var edicion = $("#edicion").val();
    var nivel = $("#nivel").val();

    if (titulo == '') {
        swal({
            title: "Campo titulo requerido!",
            type: "warning"
        });
    } else if (url_foto == '') {
        swal({
            title: "Imagen requerida!",
            type: "warning"
        });
    } else if (fotografo == '') {
        swal({
            title: "Campo fotografo requerido!",
            type: "warning"
        });
    } else if (fecha == '') {
        swal({
            title: "Campo fecha requerido!",
            type: "warning"
        });
    } else if (editor == '' && reportero == '') {
        swal({
            title: "Se necesita un editor o un reportero!",
            type: "warning"
        });
    } else if (categoria == '') {
        swal({
            title: "Seleccione una Categoria!",
            type: "warning"
        });
    } else if (edicion == '') {
        swal({
            title: "Seleccione una Edicion!",
            type: "warning"
        });
    } else if (nivel == '') {
        swal({
            title: "Seleccione el Nivel!",
            type: "warning"
        });
    } else {
        $.ajax({
            url: "periodico/Controller_noticia/actualizar_crear_noticia",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#carga").css("display", "block");
            },
            success: function (data) {
                $("#carga").fadeOut("slow");
                if (data.trim() == 'created') {
                    showNotification('bg-teal', 'Registro agregado con exito', 'top', 'center', 'animated zoomInDown', 'animated zoomOutDown');
                    $("#create_form_modal").modal('hide');
                    if ($('.modal-backdrop').is(':visible')) {
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    };
                    $("#developer_cu_form")[0].reset();
                }
                $("#create_form_modal").modal('hide');
                if (data.trim() == 'update') {
                    showNotification('bg-teal', 'Registro actualizado con exito', 'top', 'center', 'animated zoomInDown', 'animated zoomOutDown');
                    $("#developer_cu_form")[0].reset();
                }
                main();
            }
        });
    }
});