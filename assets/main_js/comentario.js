// function listar_comentarios(){
// 	var comentario = localStorage.getItem("rt");
// 	if (comentario !== ''){
// 		$.ajax({
// 			url: base+"Controller_comentario/listar_comentarios" + comentario,
// 			type: "GET",
// 			dataType: "json",
// 			success: function(response) {
// 				table = "";
// 				var i = 0;
// 				$.each(response.comen, function(key, item) {
// 					i++;
// 					table += '<tr>';
// 					table += '<td>'+item.idComentario+'</td>';
// 					table += '<td>'+item.nombre+'</td>';										
// 					table += '<td>'+item.comentario+'</td>';
// 					table += '<td>'+item.titulo+'</td>';
// 					table += '<td>'+item.estado+'</td>';
// 					table += '<td><img src=" '+ host +' "assets/upload/perfiles/' + item.foto_comen + ' style=heigth: 50px;>"+</td>';
// 					table += '<a class="btn btn-xs btn-circle" onclick="linea_comentario('+item.idperfiles+');"><i style="color:#2B77A8;" class="fa fa-pencil"></i></a>';				
// 					table += '</td>';
// 					table += '</tr>';
// 				});
// 				if (i == 0){
// 					table += '<tr><td colspan="4"><h4 align="center">Sin Perfiles!</h4></td></tr>';
// 				}
// 				$("#tb-comentario").html(table);
// 			}
// 		});
// 	}	
// }

function main() {
    var table = $('#tb-categoria').DataTable()
    table.destroy();
    table = $('#tb-categoria').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": host + "periodico/Controller_comentario/listar_comentarios",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [-1],
            "orderable": false,
        },],
    });
}

$(document).on("submit", "#form-comentario", function (e) {e.preventDefault();
    
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
    