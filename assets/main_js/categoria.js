$(document).on("ready", main);

function main() {
    var table = $('#tb-categoria').DataTable()
    table.destroy();
    table = $('#tb-categoria').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": host + "periodico/Controller_categoria/listar_categoria",
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
    $("#form-title").text("Agregar Categoria");
    $("#nombreb").text("Agregar");
    $("#create_form_modal").modal("show");
});

$(document).on("submit", "#developer_cu_form", function (e) {
    e.preventDefault();
    var categoria = $("#categoria").val();
    var icono = $("#icono").val();
    var cat_s = $("#cat_s").val();

    if (categoria == '') {
        swal({
            title: "Campo categoria requerido",
            type: "warning"
        });
    } else if (icono == '') {
        swal({
            title: "Campo icono requerido",
            type: "warning"
        });
    } else if (cat_s == '') {
        swal({
            title: "Selecciona una categoria",
            type: "warning"
        });
    } else {
        $.ajax({
            url: "periodico/Controller_categoria/actualizar_crear_categoria",
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