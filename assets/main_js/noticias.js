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

$(document).on("click", "#editBtnId", function (e) {
    e.preventDefault();
    var editBtnId = $(this).attr('data-editBtnId');
    var action = 'fetchSingleRow';
    $.ajax({
        url: "periodico/Controller_noticia/linea_actualizar",
        method: "POST",
        data: {
            editBtnId: editBtnId,
            action: action
        },
        dataType: "json",
        beforeSend: function () {
            $("#carga").css("display", "block");
            $("#create_form_modal").modal('show');
        },
        success: function (data) {
            $("#carga").fadeOut("slow");
            $("#titulo").val(data.Titular);
            $("#titulo").change();
            $("#subtitulo").val(data.Subtitulo);
            $("#subtitulo").change();
            $("#url").val(data.url);
            $("#url").change();
            $("#fotografo").val(data.Fotografo);
            $("#fotografo").change();
            $("#fecha").val(data.Fecha);
            $("#fecha").change();
            $("#editor").val(data.Editor);
            $("#editor").change();
            $("#reportero").val(data.Reportero);
            $("#reportero").change();
            $("#categoria").val(data.id_cat_noticia);
            $("#categoria").change();
            $("#edicion").val(data.id_edicion);
            $("#edicion").change();
            $("#nivel").val(data.id_cat_nivel);
            $("#nivel").change();
            $("#form-title").text('Editar noticia');
            $("#action").val('update');
            $("#nombreb").html('Actualizar');
            $("#updateId").val(editBtnId);
        }
    });
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