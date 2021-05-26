$(document).on("ready",main);
$(document).on("ready",obtener_categoria);

function main(){
    listar_noticias("",1,9);
}

$(document).on("keyup", "#busqueda", function () {
    var busqueda = $("#busqueda").val();
    var cantidad = $("#cantidad").val();
    listar_noticias(busqueda,1,cantidad);
});

$(document).on("change", "#cantidad", function () {
    var busqueda = $("#busqueda").val();
    var cantidad = $("#cantidad").val();
    listar_noticias(busqueda,1,cantidad);
});

$("body").on("click", ".pagination li", function () {
    var busqueda = $("#busqueda").val();
    var cantidad = $("#cantidad").val();
    indice = $(this).data("id");
    listar_noticias(busqueda,indice,cantidad);
});


function obtener_categoria(){
    var menu = localStorage.getItem("CatId");
    $.ajax({
        url: host+"Controller_web/get_categoria",
        type: "POST",
        data: {
            menu: menu
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.categoria, function(key, item) {
                filas = "<h2>"+item.nc_noticia+"</h2>";
            });
            $("#titulo").html(filas);
        }
    });
}

function listar_noticias(buscar, pagina, cantidad){
    var menu = localStorage.getItem("CatId");
    $.ajax({
        url: host+"Controller_web/listar_noticias",
        type: "POST",
        data: {
            menu: menu,
            buscar: buscar,
            numeropagina: pagina,
            cantidad: cantidad
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.noticias, function(key, item) {
                filas += '<div class="col-md-4 service_blog margin_bottom_50">';
                filas += '<div class="full">';
                filas += '<div class="service_img"><center><img class="img-responsive" src="'+host+'assets/upload/noticias/'+item.url+'" style="height:350px;" alt="#"/></center></div>';
                filas += '<div class="service_cont" style="position: relative;">';
                filas += '<h3 class="service_head" style="height:75px;">'+item.Titular+'</h3>';
                filas += '<p >'+item.Nota+'......</p>';
                filas += '</br>';
                filas += '</br>';
                filas += '</br>';
                filas += '</br>';
                filas += '</div>';
                filas += '<div class="bt_cont" style="position: absolute; bottom: 0;"><a class="btn sqaure_bt" id="btnNoticia" data-btnNoticiaId="'+item.id_noticia+'" href="">Leer Mas</a></div>';
                filas += '</div>';
                filas += '</div>';
            });
            $("#tb_noticias").html(filas);

            linkseleccionado = Number(pagina);
            //total registros
            totalregistros = response.totalregistros;
            //cantidad de registros por pagina
            cantidadregistros = response.cantidad;
            numerolinks = Math.ceil(totalregistros / cantidadregistros);
            paginador = "<ul class='pagination'>";
            if (linkseleccionado > 1) {
                paginador += "<li data-id='1'><a>&laquo;</a></li>";
                paginador += "<li data-id='" + (linkseleccionado - 1) + "'><a>&lsaquo;</a></li>";
            } else {
                paginador += "<li class='disabled'><a>&laquo;</a></li>";
                paginador += "<li class='disabled'><a>&lsaquo;</a></li>";
            }
            //muestro de los enlaces 
            //cantidad de link hacia atras y adelante
            cant = 2;
            //inicio de donde se va a mostrar los links
            pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
            //condicion en la cual establecemos el fin de los links
            if (numerolinks > cant) {
                //conocer los links que hay entre el seleccionado y el final
                pagRestantes = numerolinks - linkseleccionado;
                //defino el fin de los links
                pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) : numerolinks;
            } else {
                pagFin = numerolinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkseleccionado) paginador += "<li class='active'><a" + i + "</a></li>";
                else paginador += "<li data-id='"+i+"'><a>" + i + "</a></li>";
            }
            //condicion para mostrar el boton sigueinte y ultimo
            if (linkseleccionado < numerolinks) {
                paginador += "<li data-id='" + (linkseleccionado - 1) + "'><a>&rsaquo;</a></li>";
                paginador += "<li data-id='"+numerolinks+"'><a>&raquo;</a></li>";
            } else {
                paginador += "<li class='disabled'><a>&rsaquo;</a></li>";
                paginador += "<li class='disabled'><a>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
        }
    });
}