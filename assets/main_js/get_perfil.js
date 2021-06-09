$(document).on("ready",get_comentarios());

function get_comentarios(){
    var perfil = localStorage.getItem("PerfilId");
    filas = '';

    filas += '<div class="section padding_layout_1 testmonial_section white_fonts" style="background-image: url(http://localhost/template/assets/web/images/it_service/test_bg.png);">';
    filas += '<div class="container">';
    filas += '<div class="row">';
    filas += '<div class="col-md-12">';
    filas += '<div class="full">';
    filas += '<div class="main_heading text_align_left">';
    filas += '<h2 style="text-transform: none;">What Clients Say?</h2>';
    filas += '<p class="large">Here are testimonials from clients..</p>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';
    filas += '<div class="row">';
    filas += '<div class="col-sm-7">';
    filas += '<div class="full">';
    filas += '<div id="testimonial_slider" class="carousel slide" data-ride="carousel">';
    filas += '<div class="carousel-inner">';
    filas += '<div class="carousel-item active">';
    filas += '<div class="testimonial-container">';
    filas += '<div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.</div>';
    filas += '<div class="testimonial-photo"> <img src="assets/web/images/it_service/client1.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>';
    filas += '<div class="testimonial-meta">';
    filas += '<h4>Maria Anderson</h4>';
    filas += '<span class="testimonial-position">CFO, Tech NY</span>';
    filas += '</div>';
    filas += '</div>';
    filas += '<br>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';
    filas += '<div class="col-sm-5">';
    filas += '<div class="full"> </div>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';
    filas += '</div>';

    $("#perfil").html(filas);
}
