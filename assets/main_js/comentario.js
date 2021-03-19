function listar_comentarios(){
	var comentario = localStorage.getItem("rt");

	if (comentario !== ''){
		$.ajax({
			url: base+"Controller_"+comentario,
			type: "GET",
			dataType: "json",
			success: function(response) {
				table = "";
				var i = 0;
				$.each(response.enferm, function(key, item) {
					i++;
					table += '<tr>';
					table += '<td>'+item.imagen+'</td>';
					table += '<td>'+item.comentario+'</td>';										
					table += '<a class="btn btn-xs btn-circle" onclick="linea_act_pato('+item.idperfiles+');"><i style="color:#2B77A8;" class="fa fa-pencil"></i></a>';
					// table += '<button type="button" class="btn btn-xs btn-circle" id="deletePato" data-deletePato=' + item.id_enfermedad + '><i style="color:#D91F1F;" class="fa fa-trash-o"></i></button>';
					table += '</td>';
					table += '</tr>';
				});
				if (i == 0){
					table += '<tr><td colspan="4"><h4 align="center">Sin patologias!</h4></td></tr>';
				}
				$("#lista_comentarios").html(table);
			}
		});
	}	
}



$(document).on("click", "#crea_act_comen", function(e) {
	e.preventDefault();
		
    var comentario = $('#comentario').val();

		if (comentario == '') {
			swal("Alerta!", "Campo comentario Requerido!", "warning");
		} else {
            var comentario = $('#comentario').val();
            var imagen = $('#imagen').val();            
            if (comentario == '') {
                swal("Alerta!", "Campo comentario Requerido!", "warning");
            } else {
                var table = document.getElementById("lista_comentarios");
                {
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
    
                    cell1.innerHTML = comentario;
                    cell2.innerHTML = imagen;                    
                    cell4.innerHTML = '<input type="hidden" name="comentario[]" value="'+Pato+'">'+
                    '<input type="hidden" name="imagen[]" value="'+Des+'">';              
                }
                $('#comentario').val('');
                $('#imagen').val('');            
            }
        }
    });
    