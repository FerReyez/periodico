$(document).on("click", "#btnComentario", function () {
    var idperfiles = $(this).attr("data-btnComentario");
    $("#idperfiles").val(idperfiles);
    listar_comentarios(idperfiles);
    $("#carga-comentario").fadeOut("slow");
    $(".form-line").removeClass("focused");
    $("#form-comentario")[0].reset();
    $("#comentario-title").text("Agregar Comentario");    
    $("#nombreb").text("Agregar");
    $("#modal-perfil").modal("show");
});

function listar_comentarios(perfilId){
    var action = 'get';
    $.ajax({
        url: host+"periodico/Controller_comentario/listar_comentarios",
        type: "POST",
        data:{
            perfilId: perfilId,
            action: action
        },
        dataType: "json",
        success: function(response) {
            table = "";
            var i = 0;
            $.each(response.comen, function(key, item) {
                i++;
                estado = item.estado;
                table += '<tr>';					
                table += '<td>'+i+'</td>';
                table += '<td>'+item.nombre+'</td>';
                table += '<td>'+item.titulo+'</td>';									
                table += '<td>'+item.comentario+'</td>';
                if(estado == 1){
                    table += "<td><i class='material-icons' style='color:green;'>done</i></td>";
                } else {
                    table += "<td><i class='material-icons' style='color:red;'>clear</i></td>";
                }
                table += '<td><img src=" '+ host +'assets/upload/perfiles/'+ item.foto_comen + '" width="50"></td>';
                table += '<td><a class="btn btn-xs btn-circle" onclick="linea_comentario('+item.idperfiles+');"><i style="color:#red;" class="fa fa-pencil"></i></a></td>';				
                table += '</td>';
                table += '</tr>';
            });
            if (i == 0){
                table += '<tr><td colspan="7"><h4 align="center">Sin Comentarioss!</h4></td></tr>';
            }
            $("#tb-comentario tbody").html(table);
        }
    });
}

$(document).on("submit", "#form-comentario", function (e) {e.preventDefault();
    var idperfiles = $("#idperfiles").val();
    var nombre = $("#nombreComen").val();    
    var comentario = $("#comentario").val();
	var titulo = $("titulo").val();
	var estado = $("estado").val();
	var foto_comen = $("#foto_comen").val();

    if (nombre == '') {
        swal({
            title: "Campo nombre requerido",
            type: "warning"
        });
    } else if (comentario == '') {
        swal({
            title: "Campo comentario requerido",
            type: "warning"
        });
    } else if (titulo == '') {
        swal({
            title: "Campo titulo requerido",
            type: "warning"
        }); 
	} else if (foto_comen == '') {
		swal({
			title: "Fotografia requerida",
			type: "warning"
		});
	} else if (estado == '') {
		swal({
			title: "Estado requerido",
			type: "warning"
		});
    } else {
        $.ajax({
            url: "periodico/Controller_comentario/actualizar_crear_comentario",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#carga-comentario").css("display", "block");
            },
            success: function (data) {
                listar_comentarios(idperfiles);
                $("#carga-comentario").fadeOut("slow");
                if (data.trim() == 'created') {
                    showNotification('bg-teal', 'Registro agregado con exito', 'top', 'center', 'animated zoomInDown', 'animated zoomOutDown');
                    $("#form-comentario")[0].reset();
                }
                if (data.trim() == 'update') {
                    showNotification('bg-teal', 'Registro actualizado con exito', 'top', 'center', 'animated zoomInDown', 'animated zoomOutDown');
                    $("#form-comentario")[0].reset();
                }
            }
        });
    }
});


    // $(document).on("click", "#editBtnId", function (e) {
    //     e.preventDefault();
    //     var editBtnId = $(this).attr('data-editBtnId');
    //     var action = 'fetchSingleRow';
    //     $.ajax({
    //         url: "periodico/Controller_comentario/linea_actualizar",
    //         method: "POST",
    //         data: {
    //             editBtnId: editBtnId,
    //             action: action
    //         },
    //         dataType: "json",
    //         beforeSend: function () {
    //             $("#carga").css("display", "block");
    //             $("#create_form_modal").modal('show');
    //         },
    //         success: function (data) {
    //             $("#carga").fadeOut("slow");
    //             $("#estado").val(data.estado);
    //             $("#estado").change();
    //             $("#nombre").val(data.nombre);
    //             $("#comentario").val(data.comentario);
    //             $("#titulo").val(data.titulo);
    //             $("#idperfiles").val(data.idperfiles);
    //             $("#fecha").change();
    //             $("#form-title").text('Editar edicion');
    //             $("#action").val('update');
    //             $("#nombreb").html('Actualizar');
    //             $("#updateId").val(editBtnId);
    //         }
    //     });
    // });
    