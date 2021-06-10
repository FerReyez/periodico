$("#preload").load(function(evt){
    $(this).fadeIn(1000);
});

$(document).on("ready",get_perfil());

function get_perfil(){
    var perfil = localStorage.getItem("PerfilId");
    filas = '';
    banner = '';
    nombre = '';

    $.ajax({
        url: host+"Controller_web/get_perfil",
        type: "POST",
        data: {
            perfil: perfil
        },
        dataType: "json",
        success: function(response) {
            filas = '';
            $.each(response.perfil, function(key, item) {
                nombre = item.nombre;
                banner = item.banner;
                filas += '<div class="blog_feature_cantant">';
                filas += '<p class="blog_head">'+item.nombre+'</p>';
                filas += '<div class="post_info">';
                filas += '<ul>';
                filas += '<li><i class="fa fa-user" aria-hidden="true"></i> '+item.cargo+'</li>';
                filas += '<li><i class="fa fa-calendar" aria-hidden="true"></i> '+item.fecha_crea+'</li>';
                filas += '</ul>';
                filas += '</div>';
                filas += '<p> '+item.info+' </p>';
                filas += '</div>';
                filas += '<div class="bottom_info margin_bottom_30_all">';
                filas += '<div class="pull-right">';
                filas += '<div class="shr">Compartir: </div>';
                filas += '<div class="social_icon">';
                filas += '<ul>';
                filas += '<li class="fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
                filas += '<li class="twi"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
                filas += '<li class="gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
                filas += '<li class="pint"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>';
                filas += '</ul>';
                filas += '</div>';
                filas += '</div>';
                filas += '</div>';
            });
            $("#perfil").html(filas);
        }
    });

    $.ajax({
        url: host+"Controller_web/get_comentarios",
        type: "POST",
        data: {
            perfil: perfil
        },
        dataType: "json",
        success: function(response) {
            filas = '';

            filas += '<div id="preload" class="section padding_layout_1 testmonial_section white_fonts" style="background-image: url('+host+'assets/upload/perfiles/'+banner+');">';
            filas += '<div class="container">';
            filas += '<div class="row">';
            filas += '<div class="col-md-12">';
            filas += '<div class="full">';
            filas += '<div class="main_heading text_align_left">';
            filas += '<h2 style="text-transform: none;">Que opinan sobre '+nombre+'?</h2>';
            filas += '<p class="large">Aqui tenemos algunas opiniones.</p>';
            filas += '</div>';
            filas += '</div>';
            filas += '</div>';
            filas += '</div>';
            filas += '<div class="row">';
            filas += '<div class="col-sm-7">';
            filas += '<div class="full">';
            $.each(response.comentarios, function(key, item) {
                filas += '<div id="testimonial_slider" class="carousel slide" data-ride="carousel" style="height:175px;">';
                filas += '<div class="carousel-inner">';
                filas += '<div class="carousel-item active">';
                filas += '<div class="testimonial-container">';
                filas += '<div class="testimonial-content">'+item.comentario+'</div>';
                filas += '<div class="testimonial-photo"> <img src="'+host+'assets/upload/perfiles/'+item.foto_comen+'" class="img-responsive" alt="#" width="150" height="150"> </div>';
                filas += '<div class="testimonial-meta">';
                filas += '<h4>'+item.nombre+'</h4>';
                filas += '<span class="testimonial-position">'+item.titulo+'</span>';
                filas += '</div>';
                filas += '</div>';
                filas += '<br>';
                filas += '<br>';
                filas += '</div>';
                filas += '</div>';
                filas += '</div>';
            });
            filas += '</div>';
            filas += '</div>';
            filas += '</div>';
            filas += '<div class="col-sm-5">';
            filas += '<div class="full"> </div>';
            filas += '</div>';
            filas += '</div>';
            filas += '</div>';
            filas += '</div>';
            $("#banner").html(filas);
        }
    });
}
