<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title"><?= $titulo ?></h1>
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Blog Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- section -->
<div class="section main_slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                    <br>
                        <div id="titulo"><h2><?= $titulo ?></h2></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <p>
                    <strong>Mostrar por : </strong>
                    <select name="cantidad" id="cantidad">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar editorial..." />
                <br>
            </div>
            <div class="full">
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="tb_ediciones"></div>
            </div>
            <div class="col-md-12">
                <div class="center paginacion"></div>
                <br><br><br>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/listarEdiciones.js"></script>
<script>
$(document).on("click", "#btnEdicion", function(e){
    e.preventDefault();
    var btnEdicionId = $(this).attr("data-btnEdicionId");
    localStorage.setItem("EdicionId", btnEdicionId);
    window.location.href = host + "noticias_lista";
});
</script>