$(document).on("ready", main);

function main() {
    var table = $('#tb-edicion').DataTable()
    table.destroy();
    table = $('#tb-edicion').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": host + "periodico/Controller_edicion/listar_edicion",
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
    $("#form-title").text("Agregar Edcion");
    $("#nombreb").text("Agregar");
    $("#create_form_modal").modal("show");
});