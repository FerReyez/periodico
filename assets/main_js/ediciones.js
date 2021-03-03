$(document).on("click", "#add", function () {
    $("#carga").fadeOut("slow");
    $("#action").val("create");
    $(".form-line").removeClass("focused");
    $("#developer_cu_form")[0].reset();
    $("#form-title").text("Agregar Edcion");
    $("#nombreb").text("Agregar");
    $("#create_form_modal").modal("show");
});