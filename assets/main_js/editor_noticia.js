CKEDITOR.replace('nota', {
    customConfig: '<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor_nota.js'
});
CKEDITOR.config.height = 500;

$(document).on("click", "#notaBtnId", function (e) {
    e.preventDefault();
    var editBtnId = $(this).attr('data-notaBtnId');
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
            $("#carga-nota").css("display", "block");
            $("#nota_modal").modal("show");
        },
        success: function (data) {
            $("#carga-nota").fadeOut("slow");
            CKEDITOR.instances["nota"].setData(data.Nota)
            $("#updateIdNota").val(editBtnId);
            $("#actionNota").val('nota');
            $("#nota-title").text("Editor de la Nota");
            $("#btn-nota").text("Guardar");
        }
    });
});